# 1. Aim
To implement and demonstrate industry-level Git and GitHub commands by executing them and documenting their usage in a GitHub repository.

# 2. Description
This experiment focuses on practicing advanced Git commands and GitHub features used in real-world software development. It includes commands related to repository setup, branching, merging, rebasing, stashing, and debugging.

# 3. Task
Develop a Git-based workflow that demonstrates the following:
* Execute and document Git configuration, repository, and commit commands
* Perform branching, merging, rebasing, and undo operations
* Practice advanced commands like stash, reset, cherry-pick, and tagging
* Demonstrate GitHub features such as repository creation, pull requests, and issue tracking
* Maintain all commands and outputs in a file named `git_industry_commands.md`

# 4. Definitions
**Git**: A distributed version control system used to track changes in source code.
**Repository**: A storage location where project files and history are maintained.
**Commit**: A snapshot of changes made to the project files.
**Branch**: A separate line of development used to work independently.

# 5. Code / Implementation

## 1. Git Configuration Commands
### 1. `git config --global user.name`
**Syntax:** `git config --global user.name "Your Name"`
**Purpose:** Sets the global username for Git. This name appears as the author name in all commits.
**Example:** `git config --global user.name "sowjanya_220827"`

### 2. `git config --global user.email`
**Syntax:** `git config --global user.email "your-email@example.com"`
**Purpose:** Sets the global email address associated with Git commits.
**Example:** `git config --global user.email "n220827@rguktn.ac.in"`

### 3. `git config --list`
**Syntax:** `git config --list`
**Purpose:** Displays all the current Git configuration settings including username, email, and other Git settings.
**Output:**
```
user.name=sowjanya_220827
user.email=n220827@rguktn.ac.in
core.repositoryformatversion=0
core.filemode=false
core.bare=false
core.logallrefupdates=true
core.symlinks=false
core.ignorecase=true
```

### 4. `git config --unset`
**Syntax:** `git config --unset user.name`
**Purpose:** Removes a specific configuration value from Git settings.
**Example:** `git config --unset user.name`

## 2. Repository Setup Commands
### 1. `git init`
**Syntax:** `git init`
**Purpose:** Initializes a new Git repository in the current directory. It creates a `.git` folder to track project changes.
**Output:** `Initialized empty Git repository in C:/Users/RIBCA/Desktop/wt lab/.git/`

### 2. `git clone`
**Syntax:** `git clone <repository_url>`
**Purpose:** Copies an existing remote repository from GitHub (or other platforms) to your local system.
**Example:** `git clone https://github.com/user/sample-project.git`

### 3. `git clone --branch`
**Syntax:** `git clone --branch <branch_name> <repository_url>`
**Purpose:** Clones a specific branch from a repository instead of the default branch.
**Example:** `git clone --branch develop https://github.com/user/sample-project.git`

### 4. `git clone --depth`
**Syntax:** `git clone --depth <repository_url>`
**Purpose:** Performs a shallow clone by downloading only the latest commits, reducing clone time and size.
**Example:** `git clone --depth 1 https://github.com/user/sample-project.git`

## 3. Repository Status & Inspection
### 1. `git status`
**Syntax:** `git status`
**Purpose:** Displays the current state of the working directory and staging area.
**Output Example:**
```
On branch master
Your branch is up to date with 'origin/master'.

Untracked files:
  (use "git add <file>..." to include in what will be committed)
        git_industry_commands.md

nothing added to commit but untracked files present (use "git add" to track)
```

### 2. `git log`
**Syntax:** `git log`
**Purpose:** Shows detailed commit history.

### 3. `git log --oneline`
**Syntax:** `git log --oneline`
**Purpose:** Displays commit history in a single-line format.
**Output Example:**
```
fa8774c (HEAD -> master, origin/master, origin/HEAD) Incorporated user demonstrations for pure Google Auth payload handling
ea129c7 Integrated Google OAuth Authentication Mechanics (LAB-06)
afe6648 Migrated Auth logic natively to MongoDB & PHP Sessions (LAB-05)
```

### 4. `git log --graph`
**Syntax:** `git log --graph --oneline --all`
**Purpose:** Shows commit history in a graphical (branch) format.

### 5. `git show`
**Syntax:** `git show <commit-id>`
**Purpose:** Displays detailed information about a specific commit.

### 6. `git diff`
**Syntax:** `git diff`
**Purpose:** Shows changes between working directory and staging area.

### 7. `git diff --staged`
**Syntax:** `git diff --staged`
**Purpose:** Shows changes between staged files and last commit.

### 8. `git blame`
**Syntax:** `git blame <file>`
**Purpose:** Shows who modified each line of a file.

### 9. `git reflog`
**Syntax:** `git reflog`
**Purpose:** Shows history of HEAD changes.

### 10. `git shortlog`
**Syntax:** `git shortlog`
**Purpose:** Summarizes commits grouped by author.

## 4. File Tracking Commands
### 1. `git add`
**Syntax:** `git add <file>`
**Purpose:** Adds a specific file to the staging area.

### 2. `git add .`
**Syntax:** `git add .`
**Purpose:** Adds all modified and new files in the current directory to the staging area.

### 3. `git add -p`
**Syntax:** `git add -p`
**Purpose:** Allows staging changes interactively (part by part).

### 4. `git restore`
**Syntax:** `git restore <file>`
**Purpose:** Restores a file to its last committed state (discards changes).

### 5. `git restore --staged`
**Syntax:** `git restore --staged <file>`
**Purpose:** Unstages a file (removes it from staging area).

### 6. `git rm`
**Syntax:** `git rm <file>`
**Purpose:** Removes a file from the working directory and staging area.

### 7. `git mv`
**Syntax:** `git mv <file1> <file2>`
**Purpose:** Renames or moves a file.

# 6. Results / Screenshots

# 7. GitHub Repository Evidence
* **GitHub User ID:** sowjanya-220827
* **Repository Name:** WTLab_sowjanya
* **Repository URL:** https://github.com/sowjanya-220827/WTLab_sowjanya

# 8. Outcome
Successfully practiced and documented industry-level Git commands and GitHub features. Gained hands-on experience in version control, collaboration, and repository management.
