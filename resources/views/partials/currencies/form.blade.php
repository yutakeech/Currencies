<form method="post" action="{{ route('currencyForm') }}" id="currency_form">
    @csrf
    <div class="flex items-center justify-center flex-wrap bg-teal-500 p-6">
        <div class="flex justify-center flex-shrink-0 text-white mr-6">
            <span class="font-semibold text-xl tracking-tight">Добавление формы для отслеживания</span>
        </div>
        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <select name="char_code" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Валюта для отслеживания">
                    <option selected>выберите валюту для отслеживания</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->char_code }}">{{ $currency->nominal }} {{ $currency->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <select name="duration" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Валюта для отслеживания">
                    <option selected>Выберите промежуток времени для отслеживания:</option>
                    <option value="5">5 дней</option>
                    <option value="10">10 дней</option>
                    <option value="15">15 дней</option>
                </select>
            </div>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div>
                <input type="submit" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">
            </div>
        </div>
    </div>
</form>
