@extends('layouts.app') @section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection @section('content')
<div class="contact__alert">
  @if (session('message'))
  <div class="contact__alert--success">{{ session('message') }}</div>
  @endif @if ($errors->any())
  <div class="contact__alert--danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</div>




{{-- 検索欄 --}}


 <div class="section__title">
   <h2>Admin</h2>
 </div>
 <form class="search-form" action="/contacts/search" method="get">
    @csrf
   <div class="search-form__item">
     <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}" />
        </div>
    <div class="search-form__item">
     <select class="search-form__item-select" name="gender">
       <option value="">性別</option>
       <option value="1">男性</option>
       <option value="2">女性</option>
       <option value="3">その他</option>
               </select>
   </div>
   <div class="search-form__item">
     <select class="search-form__item-select" name="content">
       <option value="">お問い合わせの種類</option>
       @foreach ($categories as $category)
       <option value="{{ $category['content'] }}">{{ $category['content'] }}</option>
                @endforeach
     </select>
   </div>
   <div class="search-form__item">
       <input type="date" name="date"></input>
   </div>
   <div class="search-form__button">
     <button class="search-form__button-submit" type="submit">検索</button>
   </div>
   <div class="search-form__button">
     <button class="search-form__button-submit" type="submit">リセット</button>
   </div>
 </form>


 {{$contacts->links()}}

 {{-- 一覧 --}}

 <div class="contact-table">
   <table class="contact-table__inner">
     <tr class="contact-table__row">

       <th class="contact-table__header">
         <span class="contact-table__header-span">お名前</span>
        </th>
         <th class="contact-table__header">
         <span class="contact-table__header-span">性別</span>
        </th>
         <th class="contact-table__header">
         <span class="contact-table__header-span">メールアドレス</span>
        </th>
         <th class="contact-table__header">
         <span class="contact-table__header-span">お問い合わせの種類</span>
        </th>

         <span class="contact-table__header-span"></span>
       </th>

      </tr>

      @foreach ($contacts as $contact)

      <tr class="contact-table__row">
       <td>
       <div class="update-form__item">
       <p class="update-form__item-p">{{ $contact['last_name'] }}{{ $contact['first_name'] }}</p>
     </div>
  </td>
    <td>
       <div class="update-form__item">
       <p class="update-form__item-p">{{ $contact['gender'] }}</p>
     </div>
  </td>
    <td>
       <div class="update-form__item">
       <p class="update-form__item-p">{{ $contact['email'] }}</p>
     </div>
  </td>
    <td>
       <div class="update-form__item">
       <p class="update-form__item-p">{{ $contact->category->content }}</p>
     </div>
  </td>


        <td>
           <div class="update-form__button">
              <button class="update-form__button-submit" type="submit">
                詳細
              </button>
            </div>
          </form>
        </td>

        {{-- <td class="contact-table__item">
          <form class="delete-form" action="/contacts/delete" method="post">
            @method('DELETE') @csrf
            <div class="delete-form__button">
              <button class="delete-form__button-submit" type="submit">
                削除
              </button> --}}
            </div>
          </form>
        </td>
      </tr>
      @endforeach



    </table>
  </div>
</div>
@endsection
