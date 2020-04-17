## About Project

เว็บไซด์นี้ เป็นเว็บของ สังคมของทาสสัตว์เลี้ยง ทาสหมา ทาสเเมว โดยภายในเว็บจะมีระบบถามตอบ share ความรู้กันเอง หรือ ได้รับความรู้จากหมอ และยังมี tool หลายอย่างให้คนรักสัตว์ใช้ และทำให้เขาดูเเลสัตว์ของเขาได้อย่างมีประสิทธิภาพมากขึ้น. 


## How to install
 - สั่ง `npm install` เพื่อ install package ของ node ใน dependency เมื่อสั่งเสร็จ check จะต้องมี folder node_modules ขึ้นมา
 - สั่ง `composer require` เพื่อ install library ของ laravel เมื่อสั่งเสร็จ check จะต้องมี folder vendor ขึ้นมา
 - สั่ง `php migrate` เพื่อสร้าง tabel ใน database
 - สั่ง `php db:seed` เพื่อจำลอง record ใน table
 - "ของ fit เขียนต่อ" 

## Test user
    1. member(1)
        username : fish@shukishi.com
        passworf : fish1234
    2. member(2)
        username : earth@shukishi.com
        passworf : earth1234
    3. doctor
        username : mook@shukishi.com
        passworf : mook1234
    4. admin
        username : zen@shukishi.com
        passworf : mook1234    

    หรือ user อื่นๆ ดูใน  database/seeds/UserTableSeeder.php 

