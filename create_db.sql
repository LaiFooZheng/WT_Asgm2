-- Create tables for users, materials, and assessments
-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY,
    name VARCHAR(50),
    username VARCHAR(50),
    password VARCHAR(50),
    email VARCHAR(100),
    course VARCHAR(50),
    role VARCHAR(50)
);
-- Materials table
CREATE TABLE materials (
    id INT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    course VARCHAR(50)
);
-- Assessments table
CREATE TABLE assessments (
    id INT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    course VARCHAR(50)
);
-- Insert data into tables
-- Users data
INSERT INTO users (
        id,
        name,
        username,
        password,
        email,
        course,
        role
    )
VALUES (
        1,
        'user1',
        'user1',
        '123',
        'user1@example.com',
        'Web Technology',
        'user'
    ),
    (
        2,
        'Jane Smith',
        'jane',
        'password456',
        'jane.smith@example.com',
        'Data Science',
        'user'
    ),
    (
        3,
        'Alice Johnson',
        'alice',
        'password789',
        'alice.johnson@example.com',
        'Machine Learning',
        'user'
    ),
    (
        4,
        'Bob Brown',
        'bob',
        'password101',
        'bob.brown@example.com',
        'Artificial Intelligence',
        'user'
    ),
    (
        5,
        'John Doe',
        'john',
        'pass123',
        'john.doe@example.com',
        'Web Technology',
        'user'
    ),
    (
        6,
        'Emily White',
        'emily',
        'emily456',
        'emily.white@example.com',
        'Data Science',
        'user'
    ),
    (
        7,
        'Michael Lee',
        'michael',
        'michael789',
        'michael.lee@example.com',
        'Machine Learning',
        'user'
    ),
    (
        8,
        'Sarah Green',
        'sarah',
        'sarah123',
        'sarah.green@example.com',
        'Artificial Intelligence',
        'user'
    ),
    (
        9,
        'David Clark',
        'david',
        'david456',
        'david.clark@example.com',
        'Web Technology',
        'user'
    ),
    (
        10,
        'Emma Brown',
        'emma',
        'emma789',
        'emma.brown@example.com',
        'Data Science',
        'user'
    );
-- Materials data
INSERT INTO materials (id, title, description, course)
VALUES (
        1,
        'Introduction to Web Technology',
        'Basic concepts of web technology',
        'Web Technology'
    ),
    (
        2,
        'Data Science Fundamentals',
        'Introduction to data science concepts',
        'Data Science'
    ),
    (
        3,
        'Machine Learning Basics',
        'Basic machine learning algorithms and applications',
        'Machine Learning'
    ),
    (
        4,
        'Artificial Intelligence Overview',
        'Overview of AI concepts and techniques',
        'Artificial Intelligence'
    ),
    (
        5,
        'Advanced Web Technologies',
        'In-depth study of modern web technologies',
        'Web Technology'
    ),
    (
        6,
        'Data Science Advanced Techniques',
        'Advanced techniques in data science',
        'Data Science'
    ),
    (
        7,
        'Machine Learning Algorithms',
        'Various machine learning algorithms',
        'Machine Learning'
    ),
    (
        8,
        'Artificial Intelligence Applications',
        'Real-world applications of AI',
        'Artificial Intelligence'
    ),
    (
        9,
        'Web Technology Security',
        'Security aspects in web technology',
        'Web Technology'
    ),
    (
        10,
        'Data Science Case Studies',
        'Case studies in data science',
        'Data Science'
    );
-- Assessments data
INSERT INTO assessments (id, title, description, course)
VALUES (
        1,
        'Web Technology Quiz 1',
        'Quiz on basic web technology concepts',
        'Web Technology'
    ),
    (
        2,
        'Data Science Assignment 1',
        'First assignment for data science',
        'Data Science'
    ),
    (
        3,
        'Machine Learning Project',
        'Project on implementing a machine learning algorithm',
        'Machine Learning'
    ),
    (
        4,
        'Artificial Intelligence Midterm',
        'Midterm exam covering AI concepts',
        'Artificial Intelligence'
    ),
    (
        5,
        'Web Technology Final Exam Test',
        'Comprehensive exam for web technology course',
        'Web Technology'
    ),
    (
        6,
        'Data Science Quiz 1',
        'Quiz on fundamental data science concepts',
        'Data Science'
    ),
    (
        7,
        'Machine Learning Assignment 1',
        'First assignment for machine learning',
        'Machine Learning'
    ),
    (
        8,
        'Artificial Intelligence Project',
        'Project on AI implementation',
        'Artificial Intelligence'
    ),
    (
        9,
        'Web Technology Midterm Exam',
        'Midterm exam for web technology course',
        'Web Technology'
    ),
    (
        10,
        'Data Science Final Exam Test',
        'Comprehensive exam for data science course',
        'Data Science'
    );