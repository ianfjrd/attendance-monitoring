@extends('dashboard')

@section('content')

    <div class=" relative pt-28 ">
        <form action={{ route('timestamp.store') }}>
            <div class=" mx-auto  flex justify-center flex-col items-center max-w-md gap-8 ">
                <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] ">
                    BREAK TIME
                </div>
                <div class=" flex justify-center  w-full flex-col ">
                    <div class=" text-center text-xl font-semibold mb-3 ">
                        {{ date('M d, Y') }}
                    </div>
                    <div class="relative flex items-start mb-10 justify-center">
                        <div class="text-sm md:text-5xl text-white w-[350px] justify-center text-center">
                            <p class="font-light text-2xl leading-loose">Current time:</p>
                            <h3 id="clock"></h3>
                        </div>
                    </div>
                </div>
                <div class=" flex gap-4 w-full justify-center ">


                    <div
                        class=" hover:shadow-xl overflow-hidden bg-[#8EC33F] hover:bg-[#b3db77] font-[900] text-[25px] rounded-full grow text-center transition-all hover:scale-110 hover:translate-x-2  ">
                        <button class=" p-1 w-full " type="submit">Take a break</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        setInterval(displayclock, 500);

        function displayclock() {
            var time = new Date();
            var hrs = time.getHours();
            var min = time.getMinutes();
            var sec = time.getSeconds();
            var en = 'AM';
            if (hrs > 12) {
                en = 'PM';
            }
            if (hrs > 12) {
                hrs = hrs - 12;
            }
            if (hrs == 0) {
                hrs = 12;
            }
            if (hrs < 10) {
                hrs = '0' + hrs;
            }
            if (min < 10) {
                min = '0' + min;
            }
            if (sec < 10) {
                sec = '0' + sec;
            }
            document.getElementById("clock").innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
        }

        let dateToday = document.getElementById("date-today");
        let today = new Date();
        let day = `${today.getDate() < 10 ? "0" : ""}${today.getDate()}`;
        let month = `${(today.getMonth()+ 1 ) < 10 ? "0" : ""}${today.getMonth() + 1}`;
        let year = today.getFullYear();
        dateToday.textContent = `${day}-${month}-${year}`;
    </script>

@endsection
