
@extends('errors.layout')

@section('title', "400")

@section('message', __($exception->getMessage() ?: 'Bad request'))
