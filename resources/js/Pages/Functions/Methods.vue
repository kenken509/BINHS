
<script>
    const toUpperFirst = (str)=>{
        let firstLetter = str.charAt(0);
        let capFirstLetter = firstLetter.toUpperCase();
        let restOfString = str.slice(1);
        let result = capFirstLetter + restOfString;

        return result;
    }

export { toUpperFirst };
</script>