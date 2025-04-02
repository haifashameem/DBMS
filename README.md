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
## 🤝 Team Credits

- Gowrishankar S Menon (20223054)
- Haifa Shameem Thotton (20223055)
- Jacob Thomas Mathew (20223056)
- Jayadev Narayanan (20223057)
- Jijin Sreedhar (20223058)


