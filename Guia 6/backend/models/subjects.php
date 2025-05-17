<?php

function getAllSubjects($conn){
    return $conn->query('SELECT * FROM subjects');
}

function getSubjectById($conn, $id){
    $sql="SELECT * FROM subjects WHERE idSubject =?" //El signo de pregunta significa un marcador de posicion usado para evitar inyecciones SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}

function createSubject($conn, $subjectName){
    $sql = "INSERT INTO subjects (subjectName) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $subjectName);
    $stmt->execute();
    return $stmt->get_result();
}

function updateSubject($conn, $id, $subjectName){
    $sql ="UPDATE subjects SET subjectName = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $subjectName, $id);
    return   $stmt->execute();
}

function deleteSubject($conn, $id){
    $sql = "DELETE FROM subjects WHERE id = ?"
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

?>