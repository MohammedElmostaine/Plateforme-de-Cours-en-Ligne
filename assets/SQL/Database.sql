-- create database YoudemyDB;

-- use YoudemyDB;

-- Table for Users
CREATE TABLE users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) CHECK (role IN ('student', 'teacher')) NOT NULL,
    created_at DATETIME DEFAULT GETDATE()
);


-- Table for Categories
CREATE TABLE categories (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT GETDATE()
);
INSERT INTO categories (name) VALUES ('Programming');

INSERT INTO categories (name) VALUES ('Data Science');

INSERT INTO categories (name) VALUES ('Web Development');

INSERT INTO categories (name) VALUES ('Mobile Development');

INSERT INTO categories (name) VALUES ('Artificial Intelligence');

INSERT INTO categories (name) VALUES ('Cloud Computing');

INSERT INTO categories (name) VALUES ('Cybersecurity');

INSERT INTO categories (name) VALUES ('Digital Marketing');

INSERT INTO categories (name) VALUES ('Graphic Design');

INSERT INTO categories (name) VALUES ('Business & Finance');


-- Table for Tags
CREATE TABLE tags (
    id INT IDENTITY(1,1) PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT GETDATE()
);

INSERT INTO tags (name) VALUES ('Beginner');

INSERT INTO tags (name) VALUES ('Advanced');

INSERT INTO tags (name) VALUES ('Python');

INSERT INTO tags (name) VALUES ('JavaScript');

INSERT INTO tags (name) VALUES ('Machine Learning');

INSERT INTO tags (name) VALUES ('Web Development');

INSERT INTO tags (name) VALUES ('Cloud Computing');

INSERT INTO tags (name) VALUES ('Data Analysis');

INSERT INTO tags (name) VALUES ('Cybersecurity');

INSERT INTO tags (name) VALUES ('Project Management');

-- Table for Courses
CREATE TABLE courses (
    id INT IDENTITY(1,1) PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    content TEXT NOT NULL,
    teacher_id INT NOT NULL,
    category_id INT NOT NULL,
    created_at DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Pivot Table for Course-Tags (Many-to-Many)
CREATE TABLE course_tags (
    course_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

-- Table for Enrollments
CREATE TABLE enrollments (
    id INT IDENTITY(1,1) PRIMARY KEY,
    course_id INT NOT NULL,
    student_id INT NOT NULL,
    enrollment_date DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);


-- Table for Admin Logs
CREATE TABLE admin_logs (
    id INT IDENTITY(1,1) PRIMARY KEY,
    admin_id INT NOT NULL,
    action TEXT NOT NULL,
    created_at DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (admin_id) REFERENCES users(id) ON DELETE CASCADE
);