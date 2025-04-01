# Campus Notice Board System

A digital notice board system built using **HTML, CSS, JavaScript (Frontend)** and **PHP + MySQL (Backend)**. This project is part of a final semester DBMS mini project submission.

---

## 📌 Features

- Post campus-related notices (events, jobs, exams, etc.)
- Dynamic UI with category filter and search
- Stores notices in MySQL database
- Fetches and displays notices using backend API
- Responsive form with date and category input
- Fully integrated with XAMPP on localhost

---

## 🧑‍💻 Technologies Used

- **Frontend**: HTML, CSS, Vanilla JavaScript
- **Backend**: PHP (add_notice.php, get_notices.php)
- **Database**: MySQL (XAMPP - phpMyAdmin)
- **Server**: Apache (via XAMPP on Linux)

---

## ⚙️ How to Run

1. Start Apache & MySQL using XAMPP:
   ```bash
   sudo /opt/lampp/lampp start
   ```

2. Place the folder in:
   ```
   /opt/lampp/htdocs/CampusNoticeBoardSystem
   ```

3. Open browser and visit:
   ```
   http://localhost/CampusNoticeBoardSystem/index.html
   ```

4. Go to:
   ```
   http://localhost/phpmyadmin
   ```
   - Create a DB: `campusnotice`
   - Run this SQL to create the table:

     ```sql
     CREATE TABLE notices (
         id INT AUTO_INCREMENT PRIMARY KEY,
         title VARCHAR(255),
         category VARCHAR(50),
         content TEXT,
         date DATE
     );
     ```

---

## 🛠 What I Did / Modified

- Connected frontend JS form to backend using `fetch()`
- Created `add_notice.php` to store data into MySQL
- Built `get_notices.php` to dynamically load notices
- Fixed fetch + CORS issues by running via `http://localhost`
- Created clean UI using cards and category filters
- Debugged database, socket, and form submission issues

---

## 🧑‍🏫 Viva-Ready Lines

> “This project uses a frontend form that sends data to a PHP backend using fetch(). The backend stores the notice in MySQL, and the frontend reloads it dynamically using another PHP endpoint. The project runs fully on localhost using XAMPP.”

---

## 🤝 Team Credits

- Gowrishankar S Menon
- Jijin Sreedhar
- Jayadev Narayanan (you can put your name here)

