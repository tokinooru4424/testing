@extends('layouts.parent')
@section('content')
    <div class="container mt-5">
        <h1 class="text-primary mt-3 mb-4 text-center"><b>Quản lý phong thực hành máy tính</b></h1>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="msg">
            {{ $message }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">
                    <b></b>
                </div>
                <div class="col col-md-6">
                    <a href="{{ route('issues.create') }}" class="btn btn-success btn-sm float-end">Thêm mới</a>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                    <tr>
                        <th class="col-1">Mã sự cố</th>
                        <th class="text-center">Tên máy tính</th>
                        <th class="text-center">Người báo cáo</th>
                        <th class="textcenter-">Ngày báo cáo</th>

                        <th class="text-center">Mô tả</th>
                        <th class="col-3">Mức độ</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                    @if (count($issues) > 0)
                        @foreach ($issues as $row)
                            <tr>
                                <td class="col-1 text-center">{{ $row->id }}</td>
                                <td class="col-1">{{ $row->computer->computer_name }}</td>
                                <td class=" text-center">{{ $row->reported_by }}</td>
                                <td class="col-1 text-center">{{ $row->reported_date }}</td>
                                <td class="col-1">{{ $row->description }}</td>
                                <td class="col-1">{{ $row->urgency }}</td>
                                <td class="col-1">{{ $row->status }}</td>

                                
                                {{-- <td>@if ($row->StudentGender == 0)
                                    Nam
                                @else Nữ @endif</td> --}}
                                {{-- <td>{{ $row->ClassRoom->ClassRoomName }}</td> --}}
                                <td class="text-center">

                                    
                                        <a href="{{ route('issues.edit',$row->id) }}" class="btn btn-warning">Sửa</a>
                
                                        {{-- <input type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row->id ?>" value="Delete"> --}}
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row->id ?>">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                             <td>
                         <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete xác nhận</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc muốn xoá sự cố có id = <?php echo $row->id ?>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <form action="{{ route('issues.destroy',$row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-success">Có</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </td>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="3" class="text-center">No Data Found</td>
                            </tr>
                    @endif
                   </table>
                   <nav aria-label="...">
                    <ul class="pagination">
                      @if ($issues->currentPage() == 1)
                        <li class="page-item disabled">
                            <a class="page-link" href="" tabindex="-1">Previous</a>
                        </li>   
                      @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $issues->previousPageUrl() }}" tabindex="-1">Previous</a>
                        </li>
                      @endif
                      @for ($i = 1; $i <= $issues->lastPage(); $i++)
                          @if ($i == $issues->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="?page={{ $i }}"><span class="sr-only">{{ $i }}</span></a>
                            </li>
                          @else
                            <li class="page-item ">
                                <a class="page-link" href="{{ $issues->url($i) }}"> <span class="sr-only">{{ $i }}</span></a>
                                {{-- <a class="page-link" href="?page={{ $i }}"> <span class="sr-only">{{ $i }}</span></a> --}}

                            </li>
                          @endif
                      @endfor       
                      @if ($issues->currentPage() < $issues->lastPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $issues->nextPageUrl() }}">Next</a>
                        </li>
                      @else
                            <li class="page-item disabled">
                                <a class="page-link" href="" tabindex="-1">Next</a>
                            </li>
                      @endif
                    </ul>
                  </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function(){
         document.getElementById("msg").hidden = true;    
       },3000)
       document.getElementById("msg").hidden = false;    
   </script>
@endsection