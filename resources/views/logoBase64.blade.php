@php
  // Your PHP code here
  function logo(){
  $logo = "data:image/png;base64,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";
  return($logo);
  }
@endphp