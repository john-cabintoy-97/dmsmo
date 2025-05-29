<header class="topbar">
    <div class="boxTopNav ">
        <?php if (isset($_SESSION['dmsmo_isLogin'])) : ?>
            <p>Welcome: <strong> <?= strtolower($_SESSION['dmsmo_email']); ?></strong></p>
        <?php else : ?>
            <p> &nbsp;</p>
        <?php endif; ?>
    </div>
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header d-flex justify-content-start align-items-center gap-3">
            <a class="navbar-brand" href="<?= URL ?>">
                <img src="<?= URL ?>public/images/carsucc.png" alt="LOGO" class="logo" />
            </a>
            <div class="title-container">
                <h3><strong><?= TITLE ?></strong></h3>
            </div>
        </div>

        <div class="navbar-collapse ">
            <?php if (isset($_SESSION['dmsmo_isLogin'])) : ?>
                <?php if ($_SESSION['dmsmo_usertype'] === 'administrator') : ?>
                    <ul class="navbar-nav ">
                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark  profile-pic" href="<?= URL ?>"> <span class="dashboard">Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="">Memos</span></a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>admin?p=memos"><span>IN/OUT MEMOS</span> </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>admin?p=report"><span>REPORT</span> </a>
                                </li>
                            </ul>

                        </li>

                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="">Management</span></a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>admin?p=users"><span>USER</span> </a>
                                </li>

                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>admin?p=uploads"><span>DOCUMENTS FILES </span> </a>
                                </li>
                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>admin?p=archive"><span>ARCHIVED </span> </a>
                                </li>
                                <li>
                                    <a class="btn btn-sm btn-outline m-2  btn-drop  waves-effect waves-dark " href="<?= URL ?>admin?p=syslog"><span>SYSTEM LOG </span> </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="">Account</span></a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>" data-bs-toggle="modal" data-bs-target="#profileModal"><span>VIEW / EDIT</span> </a>
                                </li>
                                <li>
                                    <a class="btn btn-sm btn-outline m-2  btn-drop  waves-effect waves-dark " href="<?= URL ?>admin?p=logs"><span>LOGS</span> </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="btn btn-sm btn-outline m-2  btn-drop logout waves-effect waves-dark " href="<?= URL ?>logout/id/<?= $_SESSION['dmsmo_users']; ?>"><span>LOGOUT</span> </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php elseif ($_SESSION['dmsmo_usertype'] === 'staff') : ?>
                    <ul class="navbar-nav ">
                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark  profile-pic" href="<?= URL ?>"> <span class="dashboard">Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="">Memos</span></a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>admin?p=memos"><span>IN/OUT MEMOS</span> </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>admin?p=report"><span>REPORT</span> </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="">Management</span></a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">

                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>admin?p=uploads"><span>DOCUMENTS FILES </span> </a>
                                </li>

                                <li>
                                    <a class="btn btn-sm btn-outline m-2  btn-drop  waves-effect waves-dark " href="<?= URL ?>admin?p=syslog"><span>SYSTEM LOG </span> </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="">Account</span></a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>" data-bs-toggle="modal" data-bs-target="#profileModal"><span>VIEW / EDIT</span> </a>
                                </li>
                                <li>
                                    <a class="btn btn-sm btn-outline m-2  btn-drop  waves-effect waves-dark " href="<?= URL ?>admin?p=logs"><span>LOGS</span> </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="btn btn-sm btn-outline m-2  btn-drop logout waves-effect waves-dark " href="<?= URL ?>logout/id/<?= $_SESSION['dmsmo_users']; ?>"><span>LOGOUT</span> </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php else : ?>
                    <ul class="navbar-nav ">
                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark  profile-pic" href="<?= URL ?>users?p=memos"> <span class="dashboard">Memos</span></a>
                        </li>
                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="<?= URL ?>" data-bs-toggle="modal" data-bs-target="#uploadModal"> <span class="">Upload</span></a>
                        </li>

                        <li class="nav-item dropdown account u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="">Account</span></a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>" data-bs-toggle="modal" data-bs-target="#profileModal"><span>VIEW / EDIT</span> </a>
                                </li>
                                <li>
                                    <a class="btn btn-sm btn-outline m-2 btn-drop waves-effect waves-dark " href="<?= URL ?>users?p=syslog"><span>SYSTEM LOGS</span> </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="btn btn-sm btn-outline m-2  btn-drop logout waves-effect waves-dark " href="<?= URL ?>logout/id/<?= $_SESSION['dmsmo_users']; ?>"><span>LOGOUT</span> </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
            <?php else : ?>
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown u-pro">
                        <a class="nav-link  waves-effect waves-dark profile-pic " href="<?= URL ?>login" aria-haspopup="true" aria-expanded="false"><span class="x login-btn">LOGIN</span> </a>
                    </li>

                </ul>
            <?php endif; ?>
        </div>

    </nav>
</header>