@extends('dashboard')

@section('content')
    <div class=" relative pt-4 ">
        <form>
            <div class=" mx-auto  flex justify-center flex-col items-center max-w-md md:max-w-2xl gap-5 ">
                <div class=" w-full text-center text-3xl text-[#8EC33F] font-[900] ">
                   ATTENDANCE HISTORY
                </div>

                <x-attendance-card/>
                
                
            </div>
        </form>
    </div>

    <script>
        $(document).ready(() => {
            $("#updaloadImage").change(function() {
                const file = this.files[0];
                if (file) {
                    $('#noImageYet').addClass('hidden');
                    $('#imgPreview').removeClass('hidden');
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#imgPreview")
                            .attr("src", event.target.result);
                    };

                    reader.readAsDataURL(file);
                } else {
                    $('#noImageYet').removeClass('hidden');
                    $('#imgPreview').addClass('hidden');
                }
            });
        });
    </script>
@endsection
