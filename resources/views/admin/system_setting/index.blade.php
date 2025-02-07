@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<style>
    .d-flex {
        display: flex;
        align-items: center; /* Align items vertically in the center */
    }
 
    .d-flex .form-control {
        margin-right: 30px; /* Space between inputs */
    }
 </style>
 
 <!-- PAGE-HEADER -->
 <div class="page-header">
    <h1 class="page-title">Manage System Setting</h1>
    <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
       <li class="breadcrumb-item active" aria-current="page">Manage System Setting</li>
    </ol>
 </div>
 <!-- PAGE-HEADER END -->
 
 <!-- ROW-1 OPEN -->
 <div class="row">
    <div class="col-xl-12 col-md-12">
       <div class="card cart">
          <div class="card-header">
             <h3 class="card-title">Manage System Setting</h3>
          </div>
          <form action="{{route('admin.system_setting.create')}}" method="POST">
             @csrf
             @method('put')
        <div class="card-body">         
             <div class="form-group">
                 <div class="row mb-2">
                     <label class="col-md-3 form-label">Retry</label>
                     <div class="col-md-6 d-flex">
                         
                         <select name="retry" id="" class="form-control" required>
                           <option value="" >select</option>
                           <option value="5">5</option>
                           <option value="10">10</option>
                           <option value="15">15</option>
                           <option value="20">20</option>

                         </select>
                     </div>
                 </div>
             </div>

              <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">TimeOut</label>
                     <div class="col-md-6">
                        <input type="text" name="timeout" id="timeout" class="form-control" required/>
                     </div>
                  </div>
               </div>
               <hr/>

                <div class="form-group">
                  <div class=" row mb-2">
                     <label class="col-md-3 form-label" for="">Country Code </label>
                     <div class="col-md-6">
                        <input type="text" name="country_code" id="country_code" class="form-control" required/>
                     </div>
                  </div>
               </div>
               <hr/>
            
              
               <div class="mb-0 mt-4 row justify-content-end">
                  <div class="col-md-3">
                     {{-- <input type="hidden" name="record_id" id="record_id" value="{{ $user->id }}"/> --}}
                     <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                  </div>
               </div>
            </div>
          </div>
         </form>
      </div>
   </div>
</div>
<!-- The Modal -->
@endsection
@section('scripts')

<!-- Handle Counter js -->
@vite('resources/assets/js/handlecounter.js')
@endsection