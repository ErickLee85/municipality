<div>
    <x-flash-message />
  

    {{-- <select wire:model="selectValue" name="mySelect" id="mySelect">
        <option value="LOL">LOL</option>
        <option value="OK">OK</option>
        <option value="LMAO">LMAO</option>
        <option value="WOOPS">WOOPS</option>
    </select> --}}

    <div style="margin: 0 auto;" class="max-w-2xl mt-5">
        <div class="bg-gray-800 rounded p-6" style="display:flex; flex-direction:column; justify-content:center; align-items:center; overflow:hidden;">
            
        <h1 class="text-lg text-gray-400">{{$scienceQuestions[0]->question}}</h1>
                    @php
        $myArray = array(
                        "correctAnswer" => $scienceQuestions[0]->correctAnswer,
                        "incorrect" => $scienceQuestions[0]->incorrectAnswers[0],
                        "incorrect1" => $scienceQuestions[0]->incorrectAnswers[1],
                        "incorrect2" => $scienceQuestions[0]->incorrectAnswers[2],
                    )
        @endphp
        @php
        $keys = array_keys($myArray)
        @endphp
        @php
        shuffle($keys)            
        @endphp
        <select wire:model="selectValue" name="answer">
            <option selected value="">-------</option>
            @foreach($keys as $key )
           <option value="{{$key}}">{{$myArray[$key]}}</option>
            @endforeach
        </select>
        </div>
        </div>

   @if($selectValue == null)
            <p></p>
    @elseif($selectValue == "correctAnswer") 
        <p>That is correct!!</p>
    @else
        <p>That is incorrect!</p>
    @endif
</div>
