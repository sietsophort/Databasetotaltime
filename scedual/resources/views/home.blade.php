@extends('layouts.app')

@section('content')
    {{--@include('message')--}}
    <div class="container">
        <div class="page-header">
            <h1>Time Table</h1>
        </div>
        <form method="GET" action="{{ URL::action('HomeController@index') }}">
            <div class="input-group" style="width: 500px; float:right; padding-bottom: 20px">
                <input type="search" name="search" class="form-control" placeholder="search for...">
                <span class="input-group-btn">
                    <button type="submit" value="search" class="btn btn-success">Search</button>
                </span>
            </div>
            {{--<input type="search" name="search" id="search" placeholder="Enter name">--}}
            {{--<input type="submit" value="search" class="button expand">--}}

        </form>

        <div class="table">
            <table id="table" class=" table-responsive table-bordered" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Status</th>
                        <th>Total Hours</th>
                        <th>Date</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Change</th>
                    </tr>
                </thead>
                <tbody>
                {{--{{@define($i=1)}}--}}
                @foreach($data as $datas )

                    <tr>
                        {{--<td>{{$i++}}</td>--}}
                        <td>{{ $datas -> id }}</td>
                        <td>{{ $datas -> name }}</td>
                        <td>{{ $datas -> timein }}</td>
                        <td>{{ $datas -> timeout }}</td>
                        <td>{{ $datas -> status }}</td>
                        <td>{{ $datas -> totalhours }}</td>
                        <td>{{ $datas -> date }}</td>
                        <td>{{ $datas -> created_at }}</td>
                        <td>{{ $datas -> updated_at }}</td>
                        <td>
                            <a href="/show/{{ $datas->id }}">
                                <span class="glyphicon glyphicon-edit" type="submit"></span>
                            </a>
                            <span class="glyphicon glyphicon-trash" type="submit" data-toggle="modal"
                                  data-target="#modalDelete-{{ $datas->id }}" style="color:#cc0000; margin-left: 20px">
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {!! $data->links() !!}
            </div>

        @foreach($data as $datas)
            <!-- Modal to delete item -->
            <div class="modal fade" id="modalDelete-{{ $datas-> id}}" role="dialog">
                <form method="post" action="/delete">
                    {{ csrf_field() }}
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                Delete Contents
                            </div>
                            <div class="modal-body">
                                <p>Do you want to delete item in id </p>
                                <input type="number" name="id" class="form-control" value={{ $datas->id}}>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            @endforeach
            {{--<a href="/deleteTable" methods="post"><button class="btn btn-danger btn-lg">Delete Table</button></a>--}}
        </div>
    </div>
@endsection
