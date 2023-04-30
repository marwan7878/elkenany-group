@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">الاخبار</h1>
    
    <form class="display: flex;justify-content: center;align-items: center;" id="search-form" action="{{route('News.search')}}" method="get">
      <input class="mySearch" type="text" name="title" id="search-input">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>
  

    <a type="button" class="btn btn-secondary py-2" href="{{ route('News.archive') }}">الارشيف</a>
  </div>
  @if ($news->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" style="width: 5rem;">#</th>
              <th scope="col" style="width: 8rem;">الصورة</th>
              <th scope="col">العنوان</th>
              <th scope="col">القسم</th>
              <th scope="col">تاريخ الانشاء</th>
              <th scope="col">تاريخ التعديل</th>
              <th scope="col">الخيارات</th>
            </tr>
          </thead>
            <tbody id="tbody">
                @php
                    $counter =1;
                @endphp
              @foreach ($news as $event)
              <tr class="search2" style="border-bottom: 1px double #5d657b">
                <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
                <td><img src="/images/news/{{$event->image}}" alt="error" style="width: 60px"></td>
                <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$event->title}}</p></td>
                <td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p class=" title" style=" overflow-wrap: break-word">{{$event->category->name_ar}}</p></td>
                <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($event->created_at)->format('d/m/Y   h:i:s')}}</p></td>
                <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($event->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
                <td>
                  <a class="btn btn-secondary ms-1 py-1" href="{{ route('News.edit', $event->id) }}">تعديل</a> 
                  <a class="btn btn-danger ms-1 py-1" href="{{ route('News.soft_delete', $event->id) }}">حذف</a>  
                </td>
              </tr>
                  
              @endforeach
              </tbody>
    </table>  
    <div class="pagination justify-content-center">
      {{$news->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد اخبار</div>
    @endif
    
  </div>

</div>
@endsection
