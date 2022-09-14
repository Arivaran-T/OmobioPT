import { BrowserRouter as Router } from "react-router-dom";
import { Route, Routes } from "react-router";

import Login from "./Pages/Login/Login";
import Profile from "./Pages/Profile/Profile";

function App() {
  return (
    <div className="App">
      <Router>
        {/* <Header /> */}
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/profile" element={<Profile />} />
        </Routes>
      </Router>
    </div>
  );
}

export default App;
