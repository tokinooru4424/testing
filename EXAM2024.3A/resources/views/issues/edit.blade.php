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
            Sửa sự cố
        </div>
        <div class="card-body">
            <form action="{{ route('issues.update',$issue->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Tên máy tính</label>
                    <div class="col-sm-10">
                        <select name="computer_id" id="" >
                            @foreach ($lstComputer as $computer)
                            @if ($computer->id == $issue->computer_id)
                                <option value="{{ $computer->id }}" selected>{{ $computer->id}} - {{$computer->computer_name }}</option>
                            @else
                                <option value="{{ $computer->id }}">{{ $computer->id}} - {{$computer->computer_name }}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Người báo cáo</label>
                    <div class="col-sm-10">
                   
                            <input type="text" name="reported_by" id="" class="form-control" value="{{ $issue->reported_by }}"> 
                    
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Ngày báo cáo</label>
                    <div class="col-sm-10">
                        <input type="datetime" name="reported_date" id="" class="form-control" value="{{ $issue->reported_date }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Mô tả</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" id="" class="form-control" value="{{ $issue->description }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Mức độ</label>
                    <div class="col-sm-10">
                        <select name="urgency" id="" >
                            <option value="Low" @if ($issue->urgency === 'Low')
                                {{ 'selected' }}
                            @endif>Low</option>
                            <option value="Medium" @if ($issue->urgency === 'Medium')
                                {{ 'selected' }}
                            @endif>Medium</option>
                            <option value="High" @if ($issue->urgency === 'High')
                                {{ 'selected' }}
                            @endif>High</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
                    <div class="col-sm-10">
                       <select name="status" id="">
                        <option value="Status" @if ($issue->urgency === 'Status')
                            {{ 'selected' }}
                        @endif>Status</option>
                        <option value="In Progress" @if ($issue->urgency === 'In Progress')
                            {{ 'selected' }}
                        @endif>In Progress</option>
                        <option value="Resolved" @if ($issue->urgency === 'Resolvedt')
                            {{ 'selected' }}
                        @endif>Resolved</option>
                       </select>
                    </div>
                </div>
                
                <div class="text-center">
                    <a href="{{ route('issues.index') }}" class="btn btn-secondary">Trở về</a>
                    <input type="submit" value="Sửa" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection