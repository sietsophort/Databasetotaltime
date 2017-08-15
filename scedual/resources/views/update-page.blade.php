@extends('layouts.app')
<script src="{{ asset('js/app.js') }}"></script>

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Update Story</h1>
            <hr>

            <form action="/update" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="id">ID:</label>
                    <input class="form-control" type="number" id="id" name="id" value={{ $post->id }} required>
                </div>

                <div class="form-group">
                    <label for="food_name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" value={{ $post->name }} required>
                </div>

                <div class="form-group">
                    <label for="food_description">Time In:</label>
                    <input class="form-control" type="time" id="timein" name="timein" value={{ $post->timein }} required>
                </div>
                <div class="form-group">
                    <label for="food_description">Time Out:</label>
                    <input class="form-control" type="time" id="timeout" name="timeout" value={{ $post->timeout }} required>
                </div>
                <div class="form-group">
                    <label for="food_description">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option hidden>{{ $post->status }}</option>
                        <option id="pt"> Part time</option>
                        <option id="ft"> Full time</option>
                        <option id="perm">Permission</option>
                    </select>
                </div>

                <div class="form-group" hidden>
                    <label for="food_price">Total Hours</label>
                    <input class="form-control" type="number" id="total-hours" name="total-hours" value={{ $post->totalhours }} >
                </div>

                <div class="form-group">
                    <label for="food_price">Date</label>
                    <input class="form-control" type="date" id="date" name="date" value={{ $post->date }} required>
                </div>

                <div class="form-group">
                    <input class="form-control btn-success" type="submit" value="Update Story" id="update">
                </div>
            </form>

        </div>
    </div>

@endsection