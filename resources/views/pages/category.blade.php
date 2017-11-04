  @extends('master')
  @section('category') 
   <h4>Categories</h4>
              <ul class=" templatemo_list " >
                @foreach($content as $all_category) 
                                   
                         <li style="font-family: cursive; font-weight: bolder;"><a href="">{{$all_category->category_name}} </a></li>           
                     
                  @endforeach
                </ul>
            
@endsection