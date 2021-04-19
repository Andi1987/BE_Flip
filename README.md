# Test Backend Developer - Slightly-big Flip

Slightly-big Flip adalah layanan yang digunakan untuk proses disbursement online antar bank menggunakan bahasa pemrograman PHP (Codeigniter) dan REST API. 

# How To Run

* Import file database (db_flip.sql) ke MySQL database.
* Buka aplikasi Postman untuk menjalankan servicesnya.

# Create Request Disbursement

![image](https://user-images.githubusercontent.com/11925031/115178338-46344c00-a0fb-11eb-8b3e-47c02c42969c.png)
Hit service disburse menggunakan method POST dengan URL http://localhost/backend_flip/disburse.
Tambahkan Headers sebagai berikut :
* Authorization	: Basic SHl6aW9ZN0xQNlpvTzduVFlLYkc4TzRJU2t5V25YMUp2QUVWQWh0V0tadW1vb0N6cXA0MTo=
* Content-Type	: application/x-www-form-urlencoded

Dengan parameter yang terdiri dari :
* bank_code
* account_number
* amount
* remark

# Get Disbursement Update

![image](https://user-images.githubusercontent.com/11925031/115179350-5816ee80-a0fd-11eb-94ff-73515b6aa978.png)
Hit service disburse_get menggunakan method GET dengan URL http://localhost/backend_flip/disburse/disburse_get/3021723751.
Tambahkan Headers sebagai berikut :
* Authorization	: Basic SHl6aW9ZN0xQNlpvTzduVFlLYkc4TzRJU2t5V25YMUp2QUVWQWh0V0tadW1vb0N6cXA0MTo=
* Content-Type	: application/x-www-form-urlencoded

Parameter yang digunakan adalah ID Transaksi [3021723751]

# Requirement

* Codeigniter 3.1.11
* Mysql
* PHP 7.1
* Curl Extension
