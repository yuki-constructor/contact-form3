<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/contacts/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/contacts/index.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        Contact Form
      </a>
    </div>
  </header>

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>
      <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}"/>
              {{-- <input type="text" name="last_name" placeholder="例：山田" /> --}}
            </div>
            <div class="form__error">
                @error('last_name')
                  {{ $message }}
                  @enderror
            </div>
            <div class="form__input--text">
                <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}"/>
                {{-- <input type="text" name="first_name" placeholder="例：太郎" /> --}}
              </div>
            <div class="form__error">
                @error('first_name')
                  {{ $message }}
                  @enderror
            </div>


            <div class="form__group">
                <div class="form__group-title">
                  <span class="form__label--item">性別</span>
                  <span class="form__label--required">※</span>
                </div>
            <div class="form__group-content">
                {{-- <div class="form__input--text"> --}}

                  <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}/>男性
                 {{-- <input type="radio" name="gender" value="1" />男性 --}}
                  <input type="radio" name="gender" value="2"   {{ old('gender') == '2' ? 'checked' : ''  }}/> 女性
                  {{-- <input type="radio" name="gender" value="2"  />女性 --}}
                  <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : ''  }}/>その他
                  {{-- <input type="radio" name="gender" value="3"/>その他 --}}

                </div>
                <div class="form__error">
                      @error('gender')
                          {{ $message }}
                          @enderror
                    </div>
                </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}"/>
              {{-- <input type="email" name="email" placeholder="例：test@example.com"/> --}}
            </div>
            <div class="form__error">
                    @error('email')
                      {{ $message }}
                      @enderror
                </div>
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="tel" name="tell" placeholder="08012345678"  value="{{ old('tell') }}"/>
              {{-- <input type="tel" name="tell" placeholder="08012345678"/> --}}
            </div>
            <div class="form__error">
                  @error('tell')
                          {{ $message }}
                          @enderror
                    </div>
            </div>
          </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
              <span class="form__label--item">住所</span>
              <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
                {{-- <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3"/> --}}
              </div>
              <div class="form__error">
                   @error('address')
                      {{ $message }}
                      @enderror
                </div>
              </div>
            </div>
          </div>


          <div class="form__group">
            <div class="form__group-title">
              <span class="form__label--item">建物名</span>
              <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101"  value="{{ old('building') }}"/>
                {{-- <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101"> --}}
              </div>
              <div class="form__error">
                @error('building')
                      {{ $message }}
                      @enderror
              </div>
            </div>
          </div>


          <div class="form__group">
            <div class="form__group-title">
              <span class="form__label--item">お問い合わせの種類</span>
              <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <select id="category" name="category_id">


                    <option value="">選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == old("category_id")) selected @endif>{{$category->content}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form__error">
                @error('category')
                      {{ $message }}
                      @enderror
              </div>
            </div>
          </div>


        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail') }}</textarea>
            </div>
            <div class="form__error">
                @error('detail')
                      {{ $message }}
                      @enderror
              </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>
