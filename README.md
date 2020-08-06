# The story

Once upon a time there was a great hero, called Orderus, with some strengths and weaknesses,
as all heroes have.
After battling all kinds of monsters for more than a hundred years, Orderus now has the
following stats:
* Health: 70 - 100
* Strength: 70 - 80
* Defence: 45 – 55
* Speed: 40 – 50
* Luck: 10% - 30% (0% means no luck, 100% lucky all the time).
Also, he possesses 2 skills:
* Rapid strike: Strike twice while it’s his turn to attack; there’s a 10% chance he’ll use this skill
every time he attacks
* Magic shield: Takes only half of the usual damage when an enemy attacks; there’s a 20%
change he’ll use this skill every time he defends.

## Gameplay
As Orderus walks the ever-green forests of Emagia, he encounters some wild beasts, with the
following properties:
* Health: 60 - 90
* Strength: 60 - 90
* Defence: 40 – 60
* Speed: 40 – 60
* Luck: 25% - 40%

You’ll have to simulate a battle between Orderus and a wild beast, either at command line or
using a web browser. On every battle, Orderus and the beast must be initialized with random
properties, within their ranges.
The first attack is done by the player with the higher speed. If both players have the same speed,
than the attack is carried on by the player with the highest luck. After an attack, the players switch
roles: the attacker now defends and the defender now attacks.
The damage done by the attacker is calculated with the following formula:
Damage = Attacker strength – Defender defence
The damage is subtracted from the defender’s health. An attacker can miss their hit and do no
damage if the defender gets lucky that turn.
Orderus’ skills occur randomly, based on their chances, so take them into account on each turn.

Game over
The game ends when one of the players remain without health or the number of turns reaches 20.
The application must output the results each turn: what happened, which skills were used (if any),
the damage done, defender’s health left.
If we have a winner before the maximum number of rounds is reached, he must be declared

Rules
Emagia is a land where magic does happen. Still, for this magic to work, you’ll have to follow these
rules:
* Write code in plain PHP, without any frameworks (you are free to use 3rd parties like
PHPUnit, UI libs / frameworks)
* Make sure your application is decoupled, code reusable and scalable. For example, can a
new skill easily be added to our hero?
* Is your code bug-free and tested?
* There’s no time limit, take your time for the best approach you can think of


## Add new Skills

To add a new skill, follow these steps:
1) Create a new class in src\Service\Skill\AttackSkills or DefenceSkills, depending on the type of skill you want to have.
2) The class must implement the SkillInterface interface.
3) It is recommended to extend the AbstractSkill class.
``` i.e. class RapidStrike extends AbstractSkill implements SkillInterface; ```
4) You need to define a protected $chance property, and set a number between 1 and 100. This will be the chance the player has to use that skill.
5) You need to define the supports() and handle() methods. If you have extended the AbstractSkill class, you will only need to create the handle method, which will include the business logic for that skill.
6) That's it. The system will take care of the rest and implement the new skills in the battle system.
7) Enjoy life.
