<?php
if (session_status() === PHP_SESSION_NONE) session_start();
const DB_HOST = '127.0.0.1';
const DB_NAME = 'sahora_market';
const DB_USER = 'root';
const DB_PASS = 'Password@123';
function db(): PDO { static $pdo; if (!$pdo) { $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',DB_USER,DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]); } return $pdo; }
function e($s): string {return htmlspecialchars((string)$s,ENT_QUOTES,'UTF-8');}
function money($n): string {return 'Rs. '.number_format((float)$n,2);}
function csrf(): string {return $_SESSION['csrf'] ??= bin2hex(random_bytes(32));}
function check_csrf(): void {if(!hash_equals(csrf(),(string)($_POST['csrf']??''))) {http_response_code(403);exit('Invalid security token');}}
function redirect($path): never {header('Location: '.$path);exit;}
function user(): ?array {return $_SESSION['user']??null;}
function require_admin(): void {if((user()['role']??'')!=='admin'){http_response_code(403);exit('Admin access required');}}
function products(): array {return db()->query('SELECT p.*, c.name category FROM products p JOIN categories c ON c.id=p.category_id WHERE p.active=1 ORDER BY p.id DESC')->fetchAll();}
function cart_count(): int {return array_sum($_SESSION['cart']??[]);}
function cart_rows(): array {$cart=$_SESSION['cart']??[];if(!$cart)return []; $ids=array_keys($cart);$marks=implode(',',array_fill(0,count($ids),'?'));$q=db()->prepare("SELECT * FROM products WHERE active=1 AND id IN ($marks)");$q->execute($ids);$rows=$q->fetchAll();foreach($rows as &$r){$r['qty']=min((int)$cart[$r['id']],(int)$r['stock']);}return $rows;}
function cart_total(): float {$sum=0;foreach(cart_rows() as $r)$sum+=$r['price']*$r['qty'];return $sum;}
