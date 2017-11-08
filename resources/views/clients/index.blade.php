@extends('clients.layouts.default')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-md-12 mt-4">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Client Listings</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <a href="{{ url('clients/create') }}">
                                <button type="button" class="btn btn-sm btn-primary btn-create">Add Client</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-list .table-hover">
                            <thead>
                            <tr>
                                <th class="hidden-xs">ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>DOB</th>
                                <th>Mobile</th>
                                <th>E-mail</th>
                                <th>Nationality</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Country</th>
                                <th>Education</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($records as $record)
                                <tr>
                                    <td class="hidden-xs">{{ $loop->index + 1 }}</td>
                                    <td>{{ $record['First Name'] }}</td>
                                    <td>{{ $record['Last Name'] }}</td>
                                    <td>{{ $record['DOB'] }}</td>
                                    <td>{{ $record['Mobile'] }}</td>
                                    <td>{{ $record['E-mail'] }}</td>
                                    <td>{{ $record['Nationality'] }}</td>
                                    <td>{{ $record['Gender'] }}</td>
                                    <td>{{ $record['Address'] }}</td>
                                    <td>{{ $record['City'] }}</td>
                                    <td>{{ $record['State'] }}</td>
                                    <td>{{ $record['Zip'] }}</td>
                                    <td>{{ $record['Country'] }}</td>
                                    <td>{{ $record['Education'] }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col col-xs-4">Page {{$page}} of {{ $count }}
                        </div>
                        <div class="col col-xs-8">
                            <ul class="pagination pull-right">

                                @if ($page != 1)
                                    <li><a href="{{ url('clients?page=1')}}">«</a></li>
                                @endif
                                @for ($i = 1; $i <= $count/10; $i++)

                                    <li><a href="{{ url('clients?page=' . $i)  }}"
                                           @if ($page == $i) class="active" @endif >{{$i}}</a></li>
                                @endfor
                                @if ($page != $count/10)
                                    <li><a href="{{ url('clients?page=' . $count/10)}}">»</a></li>
                                @endif

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
