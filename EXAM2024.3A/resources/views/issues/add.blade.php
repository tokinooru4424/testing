@extends('layouts.parent')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-success text-lg-center" style="font-size: 30px; color:white">
            Thêm mới sự cố
        </div>
        <div class="card-body">
            <form action="{{ route('issues.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Tên máy tính</label>
                    <div class="col-sm-10">
                        <select name="computer_id" id="" >
                            @foreach ($lstComputer as $computer)
                                <option value="{{ $computer->id }}">{{ $computer->id}} - {{$computer->computer_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Người báo cáo</label>
                    <div class="col-sm-10">
                   
                            <input type="text" name="reported_by" id="" class="form-control">
                    
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Ngày báo cáo</label>
                    <div class="col-sm-10">
                        <input type="datetime" name="reported_date" id="" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Mô tả</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" id="" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Mức độ</label>
                    <div class="col-sm-10">
                        <select name="urgency" id="" >
                          
                            <option value="Low">Low</option>
                            <option value="Medium">Occupied</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
                    <div class="col-sm-10">
                        <select name="status" id="" >
                            <option value="Open">Open</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Resolved">Resolved</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('issues.index') }}" class="btn btn-secondary">Trở về</a>
                    <input type="submit" value="Thêm" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection