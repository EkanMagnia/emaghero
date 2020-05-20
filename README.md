# Add new Skills

To add a new skill, follow these steps:
1) Create a new class in src\Service\Skill\AttackSkills or DefenceSkills, depending on the type of skill you want to have.
2) The class must implement the SkillInterface interface.
3) It is recommended to extend the AbstractSkill class.
``` i.e. class RapidStrike extends AbstractSkill implements SkillInterface; ```
4) You need to define a protected $chance property, and set a number between 1 and 100. This will be the chance the player has to use that skill.
5) You need to define the supports() and handle() methods. If you have extended the AbstractSkill class, you will only need to create the handle method, which will include the business logic for that skill.
6) That's it. The system will take care of the rest and implement the new skills in the battle system.
7) Enjoy life.
