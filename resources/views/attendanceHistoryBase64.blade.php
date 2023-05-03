@php
  // Your PHP code here
  function logo(){
  $logo = "data:image/png;base64,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";
  return($logo);
  }
@endphp