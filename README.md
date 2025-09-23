# 🎨 Design Patterns in PHP

This repository contains examples of common **Design Patterns** implemented in **PHP**.  
It is meant for learning and quick reference purposes.

---

## 📂 Implemented Patterns

- **Factory Method**  
  Demonstrates how to delegate the instantiation of objects to subclasses using a common interface.  
  Example: Creating different types of keyboards (`WindowsKeyboard`, `MacKeyboard`, `LinuxKeyboard`) depending on the operating system.


- **Abstract Factory**  
  Creates families of related objects without explicitly specifying their concrete classes. This pattern is useful when
  a system needs to be independent from how its products are created, composed, and represented.  
  Example: Create consistent UI elements (Buttons, Checkboxes, Input fields) that match specific operating system
  styles (Windows, MacOS, Linux).
  ```bash
  AbstractFactory
  ├── Interfaces/
  │   ├── UIFactory.php
  │   ├── Button.php
  │   └── Checkbox.php
  └── Implementations/
      ├── WindowsFactory.php
      ├── MacFactory.php
      └── LinuxFactory.php
  ```
  
- **Builder**  
  A creational design pattern that enables step-by-step construction of complex objects with many optional properties.
  The pattern is particularly useful when an object needs to be created with numerous possible configurations.  
  Example: Creating Dragon Ball characters with various optional attributes (name, species, transformations, etc.)
  without the need to specify all parameters or use multiple constructors.
  ```bash
  Builder
  ├── Interfaces/
  │   └── Builder.php
  └── Implementations/
      ├── DragonBallCharacter.php
      ├── DragonBallCharacterBuilder.php
      └── DragonBallCharacterDirector.php
  ```

---

## 🚀 Getting Started

### Requirements
- PHP >= 8.2
- Composer (for autoloading)

### Installation
Clone the repository and install dependencies:
```bash
  git clone https://github.com/masernab/DesignPatterns.git
  cd design-patterns-php
  composer install
```

### How to run it?
Type the command
```bash
  php artisan design-pattern:run
```