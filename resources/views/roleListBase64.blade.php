@php
    // Your PHP code here
    function logo()
    {
        $logo =
            'data:image/png;base64,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';
        return $logo;
    }
@endphp
