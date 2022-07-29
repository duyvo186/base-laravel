@extends('admin.user.main')

@section('content')
    <a class="nav-link" href="<?php echo route('admin.category.create') ?>">Add category</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>ACTIVE</th>
            <th>UPDATE</th>
            <th style="width: 100px;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        {!! \App\Helpers\Helper::category($categories, $parent_id = 0, $char = '') !!}
        </tbody>
    </table>
@endsection

