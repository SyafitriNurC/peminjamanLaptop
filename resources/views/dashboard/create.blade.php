@extends('layouts.index')

@section('content')

    
    <div class="row ">
      <div class="col-lg-6 mx-auto">
        <div class="card mb-8 mx-auto p-4 bg-light">
    
    
            <div class="card-body bg-light">
            <div class="logo">
                <img src="{{asset('assets/img/wk.png')}}" class="rounded-circle" width="40" style="margin-left: 475px;">
                    <h4>Lab RPL/PPLG</h4>
                    <h4>Laptop Landing</h4>
                <center><img src="{{asset('assets/img/pplg.jpeg')}}" class="round-circle" width="75"></center>
            </div>
            <div class="container text-center">
                <br>
            <div class="link">
                <a href="">Laptop Landing</a>
                <a class="arrow">>></a>
                <a href="create" class="text-primary">New</a>
                <a class="arrow">>></a>
                <a href="/home" class="text-primary">Data</a>
            </div>
</div>
            <form method="POST" action="/store"  >
            @csrf
            @method('POST')
            <div class = "container"> 
             <div class="controls"> 
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="form_name">Nama</label>
                            <input  type="text" name="nama" class="form-control" required="required" data-error="Firstname is required.">
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Guru</label>
                            <input type="text" name="guru" class="form-control" required="required" data-error="Lastname is required.">
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Nis</label>
                            <input id="" type="number" name="nis" class="form-control" required="required" data-error="Valid email is required.">
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Keterangan</label>
                            <input  type="text" name="keterangan" class="form-control" required="required" data-error="Lastname is required.">
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Rayon</label>
                            <select  name="rayon" class="form-control" required="required" data-error="Please specify your need.">
                                <option value="" selected disabled>Rayon</option>
                                <option value="Tajur 1">Tajur 1</option>
                                <option value="Tajur 2">Tajur 2</option>
                                <option value="Tajur 3">Tajur 3</option>
                                <option value="Tajur 4">Tajur 4</option>
                                <option></option>
                            </select>
                            
                        </div>
                    </div>

                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Tanggal Pinjam</label>
                            <input id="" type="date" name="tanggal_pinjam" class="form-control" required="required" data-error="Lastname is required.">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_description">Deskipsi</label>
                            <textarea  name="deskripsi" class="form-control" rows="4" required="required" data-error="Please, leave us a description."></textarea>
                        </div>
                    </div> 
                    
                    <button type="submit" class="btn go-button bg-primary">Submit</button>
                </div>
                </form>
                
            </div>


        </div>
         
        </div>
            </div>


    </div>
 </div>

</div>
</div>
@endsection
