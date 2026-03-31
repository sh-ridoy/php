<?php
class Student {
    // static property
    public static $totalStudent = 0;

    // static method
    public static function addStudent() {
        self::$totalStudent++;
    }

    public static function showTotal() {
        echo "Total Student: " . self::$totalStudent;
    }
}

// call static method
Student::addStudent();
Student::addStudent();
Student::addStudent();

Student::showTotal();
?>