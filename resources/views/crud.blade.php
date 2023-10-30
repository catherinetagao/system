@extends('layouts.app')

@section('content')

<!-- table for crud -->
<div class="container p-5">
    <div class="card p-5">
    <h1>CRUD Table</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>johndoe@example.com</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>janesmith@example.com</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <button id="addButton">Add New</button>
    </div>
</div>


@endsection
