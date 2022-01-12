<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zodiac;

class ZodiacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zodiac::create([
            'name' => 'Aquarius',
            'dates' => 'January 20 - February 18',
            'description' => 'Aquarius is the sign different from the rest of the zodiac and people born with their Sun in it feel special. This makes them eccentric and energetic in their fight for freedom, or at times shy and quiet, afraid to express their true personality. In both cases they are deep thinkers and highly intellectual people who love to fight for idealistic causes. They are able to see people without prejudice and this makes them truly special. Although they can easily adapt to the energy that surrounds them, Aquarius representatives have a deep need to have some time alone and away from everything in order to restore power.',
            'image'=> 'https://www.astrology-zodiac-signs.com/images/aquarius.jpg'
        ]);

        Zodiac::create([
            'name' => 'Pisces',
            'dates' => 'February 19 - March 20',
            'description' => 'Pisces are very friendly and often find themselves in company of very different people. They are selfless and always willing to help others, a very fine intent for as long as they don’t expect anything much in return. People born with their Sun in Pisces have an intuitive understanding of the life cycle and form incredible emotional relationship with other humans on the basis of natural order and senses guiding them.',
            'image'=> 'https://www.astrology-zodiac-signs.com/images/pisces.jpg'
        ]);
        Zodiac::create([
            'name' => 'Aries',
            'dates' => 'March 21 - April 19',
            'description' => 'As the first sign in the zodiac, the presence of Aries always marks the beginning of something energetic and turbulent. They are continuously looking for dynamic, speed and competition, always being the first in everything - from work to social gatherings. Thanks to its ruling planet Mars and the fact it belongs to the element of Fire (just like Leo and Sagittarius), Aries is one of the most active zodiac signs. It is in their nature to take action, sometimes before they think about it.',
            'image'=> 'https://www.astrology-zodiac-signs.com/images/aries.jpg'
        ]);
        Zodiac::create([
            'name' => 'Taurus',
            'dates' => 'April 20 - May 20',
            'description' => 'Practical and well-grounded, Taurus is the sign that harvests the fruits of labor. They feel the need to always be surrounded by love and beauty, turned to the material world, hedonism, and physical pleasures. People born with their Sun in Taurus are sensual and tactile, considering touch and taste the most important of all senses. Stable and conservative, this is one of the most reliable signs of the zodiac, ready to endure and stick to their choices until they reach the point of personal satisfaction.',
            'image' => 'https://www.astrology-zodiac-signs.com/images/taurus.jpg'
        ]);
        Zodiac::create([
            'name' => 'Gemini',
            'dates' => 'May 21 - June 20',
            'description' => 'Expressive and quick-witted, Gemini represents two different personalities in one and you will never be sure which one you will face. They are sociable, communicative and ready for fun, with a tendency to suddenly get serious, thoughtful and restless. They are fascinated with the world itself, extremely curious, with a constant feeling that there is not enough time to experience everything they want to see.',
            'image'=> 'https://www.astrology-zodiac-signs.com/images/gemini.jpg'
        ]);
        Zodiac::create([
            'name' => 'Cancer',
            'dates' => 'June 21 - July 22',
            'description' => "Deeply intuitive and sentimental, Cancer can be one of the most challenging zodiac signs to get to know. They are very emotional and sensitive, and care deeply about matters of the family and their home. Cancer is sympathetic and attached to people they keep close. Those born with their Sun in Cancer are very loyal and able to empathize with other people's pain and suffering.",
            'image'=> 'https://www.astrology-zodiac-signs.com/images/cancer.jpg'
        ]);
        Zodiac::create([
            'name' => 'Leo',
            'dates' => 'January 20 - February 18',
            'description' => 'People born under the sign of Leo are natural born leaders. They are dramatic, creative, self-confident, dominant and extremely difficult to resist, able to achieve anything they want to in any area of life they commit to. There is a specific strength to a Leo and their "king of the jungle" status. Leo often has many friends for they are generous and loyal. Self-confident and attractive, this is a Sun sign capable of uniting different groups of people and leading them as one towards a shared cause, and their healthy sense of humor makes collaboration with other people even easier.',
            'image'=> 'https://www.astrology-zodiac-signs.com/images/leo.jpg'
        ]);
        Zodiac::create([
            'name' => 'Virgo',
            'dates' => 'August 23 – September 22',
            'description' => 'Virgos are always paying attention to the smallest details and their deep sense of humanity makes them one of the most careful signs of the zodiac. Their methodical approach to life ensures that nothing is left to chance, and although they are often tender, their heart might be closed for the outer world. This is a sign often misunderstood, not because they lack the ability to express, but because they won’t accept their feelings as valid, true, or even relevant when opposed to reason. The symbolism behind the name speaks well of their nature, born with a feeling they are experiencing everything for the first time.',
            'image'=> 'https://www.astrology-zodiac-signs.com/images/virgo.jpg'
        ]);
        Zodiac::create([
            'name' => 'Libra',
            'dates' => 'September 23 - October 22',
            'description' => 'People born under the sign of Libra are peaceful, fair, and they hate being alone. Partnership is very important for them, seeking someone with the ability to be the mirror to themselves. These individuals are fascinated by balance and symmetry, they are in a constant chase for justice and equality, realizing through life that the only thing that should be truly important to themselves in their own inner core of personality. This is someone ready to do nearly anything to avoid conflict, keeping the peace whenever possible',
            'image'=> 'https://www.astrology-zodiac-signs.com/images/libra.jpg'
        ]);
        Zodiac::create([
            'name' => 'Scorpio',
            'dates' => 'October 23 - November 21',
            'description' => "Scorpios are passionate and assertive people with determination and focus you rarely see in other zodiac signs. They will turn to in-depth research to reach the truth behind anything they find important. Great leaders and guides, Scorpios are resourceful, dedicated and fearless when there is challenge to be overcome. They will hold on to other people’s secrets, even when they aren’t very fond of them to begin with and do anything they can for those they tie themselves to.",
            'image'=> 'https://www.astrology-zodiac-signs.com/images/scorpio.jpg'
        ]);
        Zodiac::create([
            'name' => 'Sagittarius',
            'dates' => 'November 22 - December 21',
            'description' => 'Curious and energetic, Sagittarius are the travelers of the zodiac. Their open mind and philosophical view motivate them to wander around the world in search of the meaning of life. Sagittarius is an extrovert, always optimistic, full of enthusiasm, and ready for changes. This is a Sun sign of individuals who are often preoccupied with mental work, but when they find grounding, they show their ability to transform visions and thoughts into concrete actions and circumstances.',
            'image' => 'https://www.astrology-zodiac-signs.com/images/sagittarius.jpg'
        ]);
        Zodiac::create([
            'name' => 'Capricorn',
            'dates' => 'December 22 - January 19',
            'description' => 'Capricorn is a sign that represents time and responsibility, and its representatives are traditional and often very serious by nature. These individuals possess an inner state of independence that enables significant progress both in their personal and professional lives. They are masters of self-control and have the ability to lead the way, make solid and realistic plans, and manage many people who work for them at any time. They will learn from their mistakes and get to the top based solely on their experience and expertise.',
            'image' => 'https://www.astrology-zodiac-signs.com/images/capricorn.jpg'
        ]);
    }
}
