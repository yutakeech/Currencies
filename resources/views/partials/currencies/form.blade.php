<form method="post" action="{{ route('currencyForm') }}" id="currency_form">
    @csrf
    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <select class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Валюта для отслеживания">
                <option name="currency" selected>Выберите валюту для отслеживания:</option>
                @foreach($currencies as $currency)
                    <option value="{{ $currency->char_code }}">{{ $currency->nominal }} {{ $currency->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <select class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Промежуток времени для отслеживания">
                <option name="duration" selected>Выберите промежуток времени для отслеживания:</option>
                <option value="5">5 дней</option>
                <option value="10">10 дней</option>
                <option value="15">15 дней</option>
            </select>
        </div>
    </div>
</form>
