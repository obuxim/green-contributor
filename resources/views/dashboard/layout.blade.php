<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="description" content="Management Dashboard for Green Contributor Website">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Zubair Hasan">
    <meta copyright="Duoneos Private Limited">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
@include('dashboard.header')
@yield('content')
@include('dashboard.footer')
