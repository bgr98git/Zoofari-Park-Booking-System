
# 🦁 Zoofari Park Booking System

Zoofari Park Booking is a web-based application that lets visitors explore a wildlife safari park, browse tour packages and services, and book packages online. An admin panel allows the park staff to manage packages, categories, services, bookings, users, contact queries and feedback.

---

## 📌 Project Profile

| Title | Detail |
|---|---|
| Project Title | Zoofari Park Booking |
| Project Type | Web Application |
| Front-End Tool | PHP, HTML, CSS, JavaScript |
| Back-End Tool | MySQL |
| Server | XAMPP (Apache + MySQL + PHP) |
| Development Tool | Macromedia Dreamweaver |
| Duration | July to September 2024 |
| Team Size | 2 |
| Stream | T.Y.B.C.A. (Sem-5) |
| Guided By | Prof. Purvi Abhani |


## 👩‍💻 Developed By

- **Gadhiya Bhakti R.**
- **Hirpara Vruti M.**


---

## ✨ Features

### 👤 User Side
- Register and Login (session based)
- Home, About Us and Services pages
- Browse tour packages by category
- Read detailed package information (inclusions, optional items, safety, FAQs)
- Book a package (adults, children, dates, time slot, payment method)
- Booking confirmation and booking details summary
- Contact Us and Feedback forms

### 🛠️ Admin Side
- Dashboard with totals (registered users, categories, packages, booked packages, services, feedback, contacts, admins)
- View and manage registered users
- Add / edit / delete Categories
- Add / edit / delete Packages and Package Details
- Add / edit / delete Services
- View booked packages
- View contact queries and user feedback

---

## 🧰 Tech Stack

- **Front End:** PHP, HTML, CSS, JavaScript
- **Database:** MySQL
- **Local Server:** XAMPP
- **Editor:** Macromedia Dreamweaver
- **OS:** Windows 10

---

## 🗄️ Database Tables

| Table | Purpose |
|---|---|
| `user_rajister` | Registered users and admins (`isAdmin` flag) |
| `category` | Package categories (Normal, Intermediate/High, Exclusive) |
| `packages` | Package name, description, duration, image, vehicle, price, category |
| `pkg_details` | Long description, inclusions, optional items, safety info, FAQs |
| `booked_pkg` | User bookings (date, adults, children, total price, payment method, status) |
| `contact` | Contact form queries |
| `services` | Park services shown on the Services page |
| `feedback` | User feedback |

The SQL file is available in the `Database` folder.

---

## 📂 Project Structure

```
Zoofari-Park-Booking-System/
│
├── Database/            # MySQL database script (.sql)
├── zoo2_Completed/      # PHP project source code
│   ├── Admin pages      # Dashboard, users, packages, categories, services, bookings
│   ├── User pages       # Home, about, services, packages, contact, feedback, login, register
│   ├── header.php       # Common header
│   └── footer.php       # Common footer
└── README.md
```

---

## 🚀 How to Run the Project

1. **Install XAMPP** and start **Apache** and **MySQL** from the XAMPP Control Panel.
2. **Clone the repository**
   ```bash
   git clone https://github.com/bgr98git/Zoofari-Park-Booking-System.git
   ```
3. **Copy the project folder** `Project` into the XAMPP `htdocs` folder  
   (for example `C:\xampp\htdocs\Project`).
4. **Create the database**
   - Open `http://localhost/phpmyadmin`.
   - Create a new database.
   - Click **Import** and select the `.sql` file from the `Database` folder.
5. **Check the database connection**
   - Open the PHP connection file in the project and make sure the host, username, password and database name match your local setup (default XAMPP: host `localhost`, user `root`, empty password).
6. **Run the website**
   - Open `http://localhost/Project/` in your browser.

---

## 🖥️ System Requirements

**Hardware**
- Hard Disk: 500 GB
- RAM: 4 GB
- 64-bit processor

**Software**
- Microsoft Windows 10 (64-bit)
- XAMPP (Apache, MySQL, PHP)
- Web browser (Chrome, Edge, Firefox)

---

## 🖼️ Screenshots

> Add your screenshots in a `screenshots/` folder and link them here.

| Page | Preview |
|---|---|
| Home Page | `![Home](screenshots/home.png)` |
| Login | `![Login](screenshots/login.png)` |
| Packages | `![Packages](screenshots/packages.png)` |
| Services | `![Services](screenshots/services.png)` |
| Book Package | `![Booking](screenshots/booking.png)` |
| Contact | `![Contact](screenshots/contact.png)` |
| Admin Dashboard | `![Admin](screenshots/admin.png)` |

---

## ⚠️ Limitations

- Reliable internet access is required.
- New users may need time to find information on the website.
- Users cannot physically experience the animals through the website.
- No professional photography tours, wildlife education center, conservation fund, adoption program or animal GPS tracking yet.

## 🔮 Future Enhancements

- Enhanced animal photography tours with professional photographers.
- Wildlife Education Center with interactive exhibits and workshops.
- Longer helicopter tour routes.
- "Save Wildlife" initiative and a conservation fund from ticket sales.
- Animal adoption program.
- GPS tracking of animals to warn guests about dangerous animals.

---

## 📚 References

- [PHP Manual – MySQLi](https://www.php.net/manual/en/book.mysqli.php)
- [W3Schools – PHP](https://www.w3schools.com/php/)
- [TutorialsPoint](https://www.tutorialspoint.com/index.htm)

---

## 📄 Note

This project was developed as an academic project for the T.Y.B.C.A. (Sem-5) curriculum.
