import classes from "./Login.module.css";
import { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

const Login = () => {
  const [email, setEmail] = useState();
  const [password, setPassword] = useState();
  const [error, setError] = useState(false);

  const navigate = useNavigate();

  const emailhandler = (event) => {
    setEmail(event.target.value);
  };
  const passwordGHandler = (event) => {
    setPassword(event.target.value);
  };

  const submitHandler = (event) => {
    event.preventDefault();

    setError(false);
    // validation;
    if (!email.trim() || !email.includes("@") || !email.includes(".")) {
      alert("Enter valid Email");
      return setError(true);
    }
    if (!password.trim() || password.length < 5) {
      alert("Enter valid Password");
      return setError(true);
    }

    axios
      .get(
        "http://localhost/OmobioTest/Trainee-Associate-Assignment/bizlogic/index.php?email=" +
          email +
          "&password=" +
          password
      )
      .then((res) => {
        if (res.data.error) {
          alert(res.data.msg);
        } else {
          alert("Login Sucess");
          localStorage.setItem("id", res.data.id);
          navigate("/profile");
        }
      })
      .catch((er) => {
        alert("Server Error. Try Again");
        console.log(er);
      });
  };

  return (
    <>
      <div className={classes.login_container}>
        <div className={classes.login}>
          <h2 className={classes.title}>Welcome Back,</h2>

          <form className={classes.form_container} onSubmit={submitHandler}>
            <label className={classes.labels} htmlFor={"username"}>
              UserName
            </label>
            <br />
            <input
              value={email}
              onChange={emailhandler}
              type="text"
              required
              id="username"
              className={classes.inputs}
            />
            <br />
            <label className={classes.labels} htmlFor={"password"}>
              Password
            </label>
            <br />
            <input
              value={password}
              onChange={passwordGHandler}
              type="password"
              required
              id="password"
              className={classes.inputs}
            />
            <br />

            <button className={classes.btn}>LOG IN</button>
          </form>
        </div>
      </div>
    </>
  );
};

export default Login;
