<?php
declare(strict_types=1);

namespace Utility\Test;

use PHPUnit\Framework\TestCase;
use Utility\Str;

class StrTest extends TestCase
{
    public function testCanGiveAccord() : void
    {
        $this->assertEquals(
            Str::accord('7', '%number bags', '%number bag'),
            '7 bags'
        );
        $this->assertEquals(
            Str::accord('1', '%number bags', '%number bag'),
            '1 bag'
        );
        $this->assertEquals(
            Str::accord('0', '%number bags', '%number bag', 'none'),
            'none'
        );
    }
    public function testCanConvertToAlpha() : void
    {
        $this->assertEquals(
            Str::alpha('Should remove all 7 spaces, and 2 symbols!'),
            'Shouldremoveallspacesandsymbols'
        );
    }
    public function testCanConvertToAlphaNumeric() : void
    {
        $this->assertEquals(
            Str::alphaNumeric('Should remove all 7 spaces, and 2 symbols!'),
            'Shouldremoveall7spacesand2symbols'
        );
    }
    public function testCanAppend() : void
    {
        $this->assertEquals(
            Str::append('This should be', ' appended'),
            'This should be appended'
        );
    }
    public function testCanConvertToASCII() : void
    {
        $this->assertEquals(
            Str::ascii('Árvíztűrő tükörfúrógép'),
            'Arvizturo tukorfurogep'
        );
    }
    public function testCanGetCharacterAt() : void
    {
        $this->assertEquals(
            Str::at('Árvíztűrő tükörfúrógép', 6),
            'ű'
        );
    }
    public function testCanEncodeBase64() : void
    {
        $this->assertEquals(
            Str::base64('Convert me, please'),
            'Q29udmVydCBtZSwgcGxlYXNl'
        );
    }
    public function testCanReturnSubStringBetween() : void
    {
        $this->assertEquals(
            Str::between('Convert me, please', 'Convert', 'please'),
            ' me, '
        );
    }
    public function testCanConvertToBoolean() : void
    {
        $this->assertEquals(
            Str::bool('yes'),
            true
        );
    }
    public function testCanConvertToCamelCase() : void
    {
        $this->assertEquals(
            Str::camel('This should be in: camel-case!'),
            'thisShouldBeInCamelCase'
        );
    }
    public function testCanGetArrayOfCharacters() : void
    {
        $this->assertEquals(
            Str::chars('Convert me, please'),
            ['C', 'o', 'n', 'v', 'e', 'r', 't', ' ', 'm', ',', 'p', 'l', 'a', 's']
        );
    }
    public function testCanCleanString() : void
    {
        $this->assertEquals(
            Str::clean('  “She’s way out of her ‘league’, I mean — you know…” '),
            '"She\'s way out of her \'league\', I mean - you know..."'
        );
    }
    public function testCanCollapseWhitespace() : void
    {
        $this->assertEquals(
            Str::collapse('  My white  spaces
            are all over     the place      '),
            'My white spaces are all over the place'
        );
    }
    public function testCanFindCommonSubString() : void
    {
        $this->assertEquals(
            Str::common('This is a word', 'That is a sentence'),
            ' is a '
        );
    }
    public function testCanFindCommonPrefix() : void
    {
        $this->assertEquals(
            Str::commonPrefix('This is a word', 'This is a sentence'),
            'This is a '
        );
    }
    public function testCanFindCommonSuffix() : void
    {
        $this->assertEquals(
            Str::commonSuffix('I mean...', 'Yes, you are mean...'),
            ' mean...'
        );
    }
    public function testCanFindStringInAnother() : void
    {
        $this->assertEquals(
            Str::contains('This one contains', 'This one'),
            true
        );
    }
    public function testCanFindAllStringsInAnother() : void
    {
        $this->assertEquals(
            Str::containsAll('This one contains', [ 'one', 'contains']),
            true
        );
    }
    public function testCanFindAnyStringsInAnother() : void
    {
        $this->assertEquals(
            Str::containsAny('This one contains', [ 'one', 'another']),
            true
        );
    }
    public function testCanCountString() : void
    {
        $this->assertEquals(
            Str::count('Count me'),
            8
        );
    }
    public function testCanConvertToDashed() : void
    {
        $this->assertEquals(
            Str::dashed('Convert me, please'),
            'Convert-me,-please'
        );
    }
    public function testCanTellIfStringEndsWith() : void
    {
        $this->assertEquals(
            Str::endsWith('What does this ends with', 'ends with'),
            true
        );
        $this->assertEquals(
            Str::endsWithAny('What does this ends with', ['any', 'with']),
            true
        );
    }
    public function testCanEnsureStringStartsWith() : void
    {
        $this->assertEquals(
            Str::ensureLeft('Robinson', 'Mr. '),
            'Mr. Robinson'
        );
    }
    public function testCanEnsureStringEndsWith() : void
    {
        $this->assertEquals(
            Str::ensureRight('Robinson tm', 'tm'),
            'Robinson tm'
        );
    }
    public function testCanFormatFileSizes() : void
    {
        $this->assertEquals(
            Str::fileSize('2048000'),
            '2MB'
        );
    }
    public function testCanGetFirstNCharacters() : void
    {
        $this->assertEquals(
            Str::first('My first', 2),
            'My'
        );
    }
    public function testCanDecodeHTML() : void
    {
        $this->assertEquals(
            Str::htmlDecode('This and&lt;br&gt;that'),
            'This and<br>that'
        );
    }
    public function testCanEncodeHTML() : void
    {
        $this->assertEquals(
            Str::htmlEncode('This and<br>that'),
            'This and&lt;br&gt;that'
        );
    }
    public function testCanFindSubStringIndex() : void
    {
        $this->assertEquals(
            Str::index('This and that', 'and'),
            5
        );
    }
    public function testCanFindAllSubStringIndexes() : void
    {
        $this->assertEquals(
            Str::indexes('this and that', 'th'),
            [0, 9]
        );
    }
    public function testCanInsertStringAt() : void
    {
        $this->assertEquals(
            Str::insert('This that', ' and', 4),
            'This and that'
        );
    }
    public function testCanTellIfStringIsAlpha() : void
    {
        $this->assertEquals(
            Str::isAlpha('Árvíztűrőthat'),
            true
        );
    }
    public function testCanTellIfStringIsAlphaNumeric() : void
    {
        $this->assertEquals(
            Str::isAlphaNumeric('Árvíztűrőthat123'),
            true
        );
    }
    public function testCanTellIfStringIsBase64() : void
    {
        $this->assertEquals(
            Str::isBase64('Q29udmVydCBtZSwgcGxlYXNl'),
            true
        );
    }
    public function testCanTellIfStringIsBlank() : void
    {
        $this->assertEquals(
            Str::isBlank('       
            '),
            true
        );
    }
    public function testCanTellIfStringIsEmail() : void
    {
        $this->assertEquals(
            Str::isEmail('this.is@an.email'),
            true
        );
    }
    public function testCanTellIfStringIsHexadecimal() : void
    {
        $this->assertEquals(
            Str::isHexadecimal('-11.4'),
            false
        );
        $this->assertEquals(
            Str::isHexadecimal('11.4'),
            false
        );
        $this->assertEquals(
            Str::isHexadecimal('11'),
            true
        );
    }
    public function testCanTellIfStringIsHTML() : void
    {
        $this->assertEquals(
            Str::isHTML('this is not HTML'),
            false
        );
        $this->assertEquals(
            Str::isHTML('this <strong>is</strong> HTML'),
            true
        );
    }
    public function testCanTellIfStringIsIPAddress() : void
    {
        $this->assertEquals(
            Str::isIP('172.168.0.0'),
            true
        );
    }
    public function testCanTellIfStringIsJSON() : void
    {
        $this->assertEquals(
            Str::isJSON('{"object": {"key": "value"}, "int": 16, "array_of_strings": ["a", "b"]}'),
            true
        );
        $this->assertEquals(
            Str::isJSON('{object: {key: "value"}, int: 16, array_of_string: ["a", "b"]'),
            false
        );
    }
    public function testCanTellIfStringIsLowerCase() : void
    {
        $this->assertEquals(
            Str::isLower('this is, lower case!'),
            true
        );
        $this->assertEquals(
            Str::isLower('THIS IS NOT LOWER CASE'),
            false
        );
    }
    public function testCanTellIfStringIsRegex() : void
    {
        $this->assertEquals(
            Str::isRegex('['),
            false
        );
        $this->assertEquals(
            Str::isRegex('/[^a-z]+/'),
            true
        );
    }
    public function testCanTellIfStringIsSerialized() : void
    {
        $this->assertEquals(
            Str::isSerialized('not serialized'),
            false
        );
        $this->assertEquals(
            Str::isSerialized('a:3:{i:0;s:4:"this";i:1;s:3:"and";i:2;s:4:"that";}'),
            true
        );
    }
    public function testCanTellIfStringIsUpperCase() : void
    {
        $this->assertEquals(
            Str::isUpper('this is lower case'),
            false
        );
        $this->assertEquals(
            Str::isUpper('THIS IS NOT LOWER CASE'),
            true
        );
    }
    public function testCanTellIfStringisURL() : void
    {
        $this->assertEquals(
            Str::isURL('google.com'),
            false
        );
        $this->assertEquals(
            Str::isURL('http://google.com'),
            true
        );
    }
    public function testCanGetLastCharacters() : void
    {
        $this->assertEquals(
            Str::last('this and that', 2),
            'at'
        );
    }
    public function testCanGetLastIndexOfSubString() : void
    {
        $this->assertEquals(
            Str::lastIndex('this and that', 'th'),
            9
        );
    }
    public function testCanCountLengthOfString() : void
    {
        $this->assertEquals(
            Str::length('this and that'),
            13
        );
    }
    public function testCanLimitString() : void
    {
        $this->assertEquals(
            Str::limit('this and that', 7),
            'this...'
        );
        $this->assertEquals(
            Str::limit('this and that', 10),
            'this and...'
        );
        $this->assertEquals(
            Str::limit('this and that', 30),
            'this and that'
        );
    }
    public function testCanLimitWords() : void
    {
        $this->assertEquals(
            Str::limitWords('this and that', 1),
            'this...'
        );
        $this->assertEquals(
            Str::limitWords('this and that', 2),
            'this and...'
        );
        $this->assertEquals(
            Str::limitWords('this and that', 4),
            'this and that'
        );
    }
    public function testCanGetLinesOfString() : void
    {
        $this->assertEquals(
            Str::lines('this
            and
            that', true),
            ['this', 'and', 'that']
        );
    }
    public function testCanConvertToLowerCase() : void
    {
        $this->assertEquals(
            Str::lower('THIS and That'),
            'this and that'
        );
    }
    public function testCanConvertFirstCharacterToLowerCase() : void
    {
        $this->assertEquals(
            Str::lowerFirst('THIS and That'),
            'tHIS and That'
        );
    }
    public function testCanCheckIfStringMatchesPattern() : void
    {
        $this->assertEquals(
            Str::matches('THIS and That', '/[a-z\s]+/i'),
            true
        );
    }
    public function testCanGetOrdinalVersion() : void
    {
        $this->assertEquals(
            Str::ordinal('11'),
            '11<sup>th</sup>'
        );
    }
    public function testCanPadString() : void
    {
        $this->assertEquals(
            Str::pad('this', 9, 'ae'),
            'thisaeaea'
        );
        $this->assertEquals(
            Str::padLeft('this', 9, 'ae'),
            'aeaeathis'
        );
        $this->assertEquals(
            Str::padBoth('this', 9, 'ae'),
            'aethisaea'
        );
    }
    public function testCanConvertToPascalCase() : void
    {
        $this->assertEquals(
            Str::pascal('get into pasCal case'),
            'GetIntoPascalCase'
        );
        $this->assertEquals(
            Str::pascal('árvíztűrő tükörfúrógép'),
            'ArvizturoTukorfurogep'
        );
    }
    public function testCanPrependStringToAnother() : void
    {
        $this->assertEquals(
            Str::prepend('into the woods', 'run '),
            'run into the woods'
        );
    }
    public function testCanGenrateRandomString() : void
    {
        $this->assertcount(
            14,
            str_split(Str::random(14))
        );
    }
    public function testCanReplace() : void
    {
        $this->assertEquals(
            Str::regexReplace('into the woods', '/[\s]/', ''),
            'intothewoods'
        );
        $this->assertEquals(
            Str::replace('into the woods', '/[\s]/', ''),
            'intothewoods'
        );
        $this->assertEquals(
            Str::replace('into the woods', ' ', ''),
            'intothewoods'
        );
        $this->assertEquals(
            Str::replace('into the woods', 'into ', ''),
            'the woods'
        );
    }
    public function testCanRemove() : void
    {
        $this->assertEquals(
            Str::remove('into the woods', '/[\s]/'),
            'intothewoods'
        );
        $this->assertEquals(
            Str::remove('into the woods', ' '),
            'intothewoods'
        );
        $this->assertEquals(
            Str::removeLeft('into the woods', 'in'),
            'to the woods'
        );
        $this->assertEquals(
            Str::removeRight('into the woods', 'ds'),
            'into the woo'
        );
    }
    public function testCanRepeatString() : void
    {
        $this->assertEquals(
            Str::repeat('yeah', 4),
            'yeahyeahyeahyeah'
        );
    }
    public function testCanReverseString() : void
    {
        $this->assertEquals(
            Str::reverse('yeah'),
            'haey'
        );
    }
    public function testCanShuffleStringCharacters() : void
    {
        $this->assertCount(
            10,
            str_split(Str::shuffle('this is it'))
        );
    }
    public function testCanSliceStrings() : void
    {
        $this->assertEquals(
            Str::slice('hello there', 3, 5),
            'lo'
        );
    }
    public function testCanSlugify() : void
    {
        $this->assertEquals(
            Str::slug('Helló there!'),
            'hello-there'
        );
        $this->assertEquals(
            Str::slugify('Helló there!', '@'),
            'hello@there'
        );
    }
    public function testCanConvertToSnakeCase() : void
    {
        $this->assertEquals(
            Str::snake('Helló there!'),
            'hello_there'
        );
    }
    public function testCanConvertSpacesAndTabs() : void
    {
        $this->assertEquals(
            Str::spacesToTabs('hello    there'),
            "hello\tthere"
        );
        $this->assertEquals(
            Str::tabsToSpaces("\thello there"),
            "    hello there"
        );
    }
    public function testCanSplitStrings() : void
    {
        $this->assertEquals(
            Str::split('this and that', '/th/'),
            ['', 'is and ', 'at']
        );
    }
    public function testCanCheckIfStringStartsWithAnother() : void
    {
        $this->assertEquals(
            Str::startsWith('Helló there!', 'Helló'),
            true
        );
        $this->assertEquals(
            Str::startsWithAny('Helló there!', ['oi', 'He']),
            true
        );
    }
    public function testCanGetSubstring() : void
    {
        $this->assertEquals(
            Str::sub('hello there', 3, 5),
            'lo th'
        );
    }
    public function testCanCompileTemplates() : void
    {
        $this->assertEquals(
            Str::template('Tom %this and %that clever', ['this' => 'is', 'that' => 'is not']),
            'Tom is and is not clever'
        );
    }
    public function testCanCheckHowManyTimesStringContainsAnother() : void
    {
        $this->assertEquals(
            Str::timesContains('this and that', 'th'),
            2
        );
    }
    public function testCanConvertToTitleCase() : void
    {
        $this->assertEquals(
            Str::title('Helló there!'),
            'Helló There!'
        );
    }
    public function testCanTitlize() : void
    {
        $this->assertEquals(
            Str::titlize('the lord of the rings'),
            'The Lord of the Rings'
        );
    }
    public function testTrim() : void
    {
        $this->assertEquals(
            Str::trim('   trim me   '),
            'trim me'
        );
        $this->assertEquals(
            Str::trimLeft('   trim me   '),
            'trim me   '
        );
        $this->assertEquals(
            Str::trimRight('   trim me   '),
            '   trim me'
        );
    }
    public function testCanMakeUnderscored() : void
    {
        $this->assertEquals(
            Str::underscored('the lord of the rings'),
            'the_lord_of_the_rings'
        );
    }
    public function testCanConvertToUpperCase() : void
    {
        $this->assertEquals(
            Str::upper('the lord of the rings'),
            'THE LORD OF THE RINGS'
        );
        $this->assertEquals(
            Str::upper('árvíztűrő tükörfúrógép'),
            'ÁRVÍZTŰRŐ TÜKÖRFÚRÓGÉP'
        );
    }
    public function testCanUpperCaseFirstLetter() : void
    {
        $this->assertEquals(
            Str::upperFirst('the lord of the rings'),
            'The lord of the rings'
        );
        $this->assertEquals(
            Str::upperFirst('árvíztűrő tükörfúrógép'),
            'Árvíztűrő tükörfúrógép'
        );
    }
    public function testCanGetWordsOutOfString() : void
    {
        $this->assertEquals(
            Str::words('the lord of the rings'),
            ['the', 'lord', 'of', 'rings']
        );
        $this->assertEquals(
            Str::words('the lord of the rings', false),
            ['the', 'lord', 'of', 'the', 'rings']
        );
    }
}
