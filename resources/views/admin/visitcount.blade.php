@extends('layouts.admin')
@section('title', 'Visitor Count')
@section('admin-content')
<style>
    a:hover{
        color: gray !important;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="table-head text-left"><i class="fas fa-table me-1"></i>Visitor <a href="" class="float-right text-decoration-none"><i class="fas fa-print"></i></a></div>

        </div>
        <div class="card-body table-card-body p-3">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="pending" style="min-height: 450px">
                   <table id="first_table" >
                    <thead class="text-center bg-light">
                        <tr>
                            <th>SL</th>
                            <th>Ip Address</th>
                            <th>User Agent</th>
                            <th>Visit Count</th>
                            <th>Last Visit</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visit_count as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->ip_address }}</td>
                                <td class="text-center">{{ $data->user_agent }}</td>
                                <td class="text-center">{{ $data->visit_count }}</td>
                                <td class="text-center">{{date('d M, Y', strtotime($data->updated_at)) ?? ''}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
@endsection
