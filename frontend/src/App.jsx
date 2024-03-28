import { A } from "@solidjs/router";

function App({ children }) {
  return (
    <>
      <div>
        <nav className="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
          <div className="container">
            <A href="/" className="navbar-brand">
              HOME
            </A>
            <button
              className="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span className="navbar-toggler-icon"></span>
            </button>
            <div
              className="collapse navbar-collapse"
              id="navbarSupportedContent"
            >
              <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                <li className="nav-item">
                  <A
                    href="/jdih/1"
                    className="nav-link active"
                    aria-current="page"
                  >
                    JDIH contoh dengan auth user
                  </A>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>

      <div class="container">{children}</div>
    </>
  );
}

export default App;