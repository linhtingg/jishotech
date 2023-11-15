-- Create the nnn_db database
CREATE DATABASE IF NOT EXISTS nnn_db;
USE nnn_db;

-- Create Topics table
CREATE TABLE topics (
    id_topic INT PRIMARY KEY,
    topic_name VARCHAR(255) NOT NULL
);

-- Create Words table
CREATE TABLE words (
    id_word INT PRIMARY KEY,
    kanji VARCHAR(255),
    katakana VARCHAR(255),
    romaji VARCHAR(255),
    hiragana VARCHAR(255) NOT NULL,
    meaning VARCHAR(255) NOT NULL,
    example VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL,
    link VARCHAR(255)
);

-- Create WordTopic table
CREATE TABLE wordtopic (
    id_wordtopic INT PRIMARY KEY,
    id_topic INT NOT NULL,
    id_word INT NOT NULL,
    FOREIGN KEY (id_topic) REFERENCES topics(id_topic),
    FOREIGN KEY (id_word) REFERENCES words(id_word)
);

-- Create User table
CREATE TABLE users (
    id_user INT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone_number INT,
    status INT NOT NULL
);

-- Create Bookmark table
CREATE TABLE bookmarks (
    id_bookmark INT PRIMARY KEY,
    id_word INT NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_word) REFERENCES words(id_word),
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

-- Create Quizz table
CREATE TABLE quizzes (
    id_quizz INT PRIMARY KEY,
    id_topic INT NOT NULL,
    id_user INT NOT NULL,
    question VARCHAR(255) NOT NULL,
    right_answer VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_topic) REFERENCES topics(id_topic),
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

