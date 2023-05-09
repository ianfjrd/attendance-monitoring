@php
    // Your PHP code here
    function logo()
    {
        $logo =
            'data:image/png;base64,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';
        return $logo;
    }
@endphp
