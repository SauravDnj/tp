PHP


<!DOCTYPE html>
<html>
<head>
    <title>CRUD Example</title>
    <style>
        .body-font {
            font-family: Arial, sans-serif;
        }

        .input-field {
            padding: 5px;
            width: 100%;
        }

        .button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

        .form-container {
            margin-bottom: 20px;
        }

        .data-table {
            border-collapse: collapse;
            width: 100%;
        }

        .data-table th, .data-table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .data-table th {
            background-color: #f2f2f2;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .data-table tr:hover {
            background-color: #f1f1f1;
        }

    </style>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="input-field"><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" class="input-field"><br>
        <input type="submit" name="create" value="Create" class="button">
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Exam";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['create'])){
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='data-table'><tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>
                  <form action='' method='post'>
                  <input type='hidden' name='id' value='".$row["id"]."'>
                  <input type='submit' name='delete' value='Delete' class='button'>
                  </form></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>






















ASP


<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .add-book-form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .add-book-form h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .input-field {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .btn-add-book {
      background-color: green;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-update-book {
      background-color: #0275d8;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-delete-book {
      background-color: red;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
  </style>
  <div class="add-book-form">
    <h1>Add a New Book</h1>
    <label for="txtISBN">ISBN:</label>
    <asp:TextBox ID="txtISBN" runat="server" CssClass="input-field" placeholder="Enter Book ISBN" required="required"></asp:TextBox>
    <br />
    <label for="txtTitle">Title:</label>
    <asp:TextBox ID="txtTitle" runat="server" CssClass="input-field" placeholder="Enter Book Title" required="required"></asp:TextBox>
    <br />
    <label for="txtAuthor">Author:</label>
    <asp:TextBox ID="txtAuthor" runat="server" CssClass="input-field" placeholder="Enter Book Author"></asp:TextBox>
    <br />
    <label for="txtDescription">Description:</label>
    <asp:TextBox ID="txtDescription" runat="server" CssClass="input-field" TextMode="MultiLine" Rows="4" placeholder="Enter Book Description"></asp:TextBox>
    <br />
    <label for="fileCoverImage">Cover Image:</label>
    <asp:FileUpload ID="fileCoverImage" runat="server" CssClass="input-field" />
    <br />
    <label for="txtPrice">Price:</label>
    <asp:TextBox ID="txtPrice" runat="server" CssClass="input-field" placeholder="Enter Book Price"></asp:TextBox>
    <br />
    <br /> &nbsp;&nbsp;&nbsp;&nbsp;
    <asp:Button ID="btnAddBook" runat="server" Text="Add Book" CssClass="btn-add-book" Width="142px" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <asp:Button ID="btnUpdate" runat="server" Text="Update" CommandName="UpdateBook" CommandArgument='
			<%# Eval("ISBN") %>' CssClass="btn-update-book" Width="110px" /> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <asp:Button ID="btnDelete" runat="server" Text="Delete" CommandName="DeleteBook" CommandArgument='
				<%# Eval("ISBN") %>' CssClass="btn-delete-book" />
  </div>

























VB Add



  Imports System.Data.SqlClient
Imports System.Data

Partial Class addBook
    Inherits System.Web.UI.Page

    Dim cn As New SqlConnection("Data Source=.\SQLEXPRESS;AttachDbFilename=E:\Projects\ASP.NET Project\WebSite\BookStore DB\BookStore.mdf;Integrated Security=True;Connect Timeout=30;User Instance=True")
    Dim cmd As New SqlCommand

    Protected Sub btnAddBook_Click(sender As Object, e As System.EventArgs) Handles btnAddBook.Click
        cn.Open()
        fileCoverImage.SaveAs(Server.MapPath("~/Books_Images/") + System.IO.Path.GetFileName(fileCoverImage.FileName))
        Dim img As String = "~/Books_Images/" + System.IO.Path.GetFileName(fileCoverImage.FileName)

        cmd = New SqlCommand("INSERT INTO AddBooks(ISBN, Title, Author, Description, CoverImage, Price) VALUES('" & txtISBN.Text & "','" & txtTitle.Text & "','" & txtAuthor.Text & "','" & txtDescription.Text & "','" & img & "','" & txtPrice.Text & "')", cn)
        cmd.ExecuteNonQuery()
        MsgBox("Your Book Details Data Inserted Successfully !!!")
        ClearAddBookInputFields()
        cn.Close()
    End Sub

    Private Sub ClearAddBookInputFields()
        txtISBN.Text = ""
        txtTitle.Text = ""
        txtAuthor.Text = ""
        txtDescription.Text = ""
        txtPrice.Text = ""
    End Sub

    Protected Sub btnUpdate_Click(sender As Object, e As System.EventArgs) Handles btnUpdate.Click
        cn.Open()

        cmd = New SqlCommand("SELECT COUNT(*) FROM AddBooks WHERE ISBN = @ISBN", cn)
        cmd.Parameters.AddWithValue("@ISBN", txtISBN.Text)
        Dim count As Integer = Convert.ToInt32(cmd.ExecuteScalar())

        If count > 0 Then            
            cmd = New SqlCommand("UPDATE AddBooks SET Title = @Title, Author = @Author, Description = @Description, Price = @Price WHERE ISBN = @ISBN", cn)
            cmd.Parameters.AddWithValue("@Title", txtTitle.Text)
            cmd.Parameters.AddWithValue("@Author", txtAuthor.Text)
            cmd.Parameters.AddWithValue("@Description", txtDescription.Text)
            cmd.Parameters.AddWithValue("@Price", txtPrice.Text)
            cmd.Parameters.AddWithValue("@ISBN", txtISBN.Text)

            cmd.ExecuteNonQuery()
            MsgBox("Book Details Updated Successfully !!!")
            ClearAddBookInputFields()
        Else
            MsgBox("Book with ISBN " & txtISBN.Text & " not found.")
            ClearAddBookInputFields()
        End If
        ClearAddBookInputFields()
        cn.Close()

    End Sub

    Protected Sub btnDelete_Click(sender As Object, e As System.EventArgs) Handles btnDelete.Click
        cn.Open()

        cmd = New SqlCommand("SELECT COUNT(*) FROM AddBooks WHERE ISBN = @ISBN", cn)
        cmd.Parameters.AddWithValue("@ISBN", txtISBN.Text)
        Dim count As Integer = Convert.ToInt32(cmd.ExecuteScalar())

        If count > 0 Then            
            cmd = New SqlCommand("DELETE FROM AddBooks WHERE ISBN = @ISBN", cn)
            cmd.Parameters.AddWithValue("@ISBN", txtISBN.Text)

            cmd.ExecuteNonQuery()
            MsgBox("Book Details Deleted Successfully !!!")
            ClearAddBookInputFields()
        Else
            MsgBox("Book with ISBN " & txtISBN.Text & " not found.")
        End If

        cn.Close()
    End Sub

End Class










Login Signin



Signin ASP

<style>
    .login-form {
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #f7f7f7;
      border-radius: 5px;
    }

    .login-heading {
      font-size: 24px;
      margin-bottom: 15px;
    }

    .login-label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .login-textbox {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .login-button {
      padding: 12px 25px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .login-button:hover {
      background-color: #0056b3;
    }
  </style>
  <form>
    <center>
      <h1>Sign Up for an Account</h1>
    </center>
    <div class="login-form">
      <h2 class="login-heading">Sign Up for an Account</h2>
      <div>
        <label class="login-label" for="fullname">Full Name:</label>
        <asp:TextBox ID="fullname" runat="server" CssClass="login-textbox" placeholder="Enter Your Name" required="required"></asp:TextBox>
      </div>
      <div>
        <label class="login-label" for="email">Email:</label>
        <asp:TextBox ID="email" runat="server" CssClass="login-textbox" placeholder="Enter Your Email" required="required"></asp:TextBox>
      </div>
      <div>
        <label class="login-label" for="username">Username:</label>
        <asp:TextBox ID="username" runat="server" CssClass="login-textbox" placeholder="Choose a UserName" required="required"></asp:TextBox>
      </div>
      <div>
        <label class="login-label" for="password">Password:</label>
        <asp:TextBox ID="password" runat="server" CssClass="login-textbox" TextMode="Password" placeholder="Enter a Password" required="required"></asp:TextBox>
      </div>
      <div>
        <asp:Button ID="signupButton" runat="server" Text="Sign Up" CssClass="login-button" />
      </div>
    </div>
  </form>



Signin VB

Imports System.Data.SqlClient
Imports System.Data

Partial Class signUp
    Inherits System.Web.UI.Page

    Dim cn As New SqlConnection("Data Source=.\SQLEXPRESS;AttachDbFilename=E:\Projects\ASP.NET Project\WebSite\BookStore DB\BookStore.mdf;Integrated Security=True;Connect Timeout=30;User Instance=True")
    Dim cmd As New SqlCommand

    Protected Sub signupButton_Click(sender As Object, e As System.EventArgs) Handles signupButton.Click
        cn.Open()
        cmd = New SqlCommand("insert into SignupUsers(FullName, Email, UserName, Password) values('" & fullname.Text & "','" & email.Text & "','" & username.Text & "','" & password.Text & "')", cn)
        cmd.ExecuteNonQuery()
        MsgBox("Your SignUp Process Successfully !!!")
        ClearSignUpInputFields()
        cn.Close()
    End Sub

    Private Sub ClearSignUpInputFields()
        fullname.Text = ""
        email.Text = ""
        username.Text = ""
        password.Text = ""
    End Sub
End Class




Login ASP

<style>
    .login-form {
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #f7f7f7;
      border-radius: 5px;
    }

    .login-heading {
      font-size: 24px;
      margin-bottom: 15px;
    }

    .login-label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .login-textbox {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .login-button {
      padding: 12px 25px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .login-button:hover {
      background-color: #0056b3;
    }
  </style>
  <form class="login-form">
    <center>
      <h1>Login to Your Account</h1>
    </center>
    <div class="login-form">
      <h2 class="login-heading">Login to Your Account</h2>
      <div>
        <label class="login-label" for="username">Username:</label>
        <asp:TextBox ID="loginusername" runat="server" CssClass="login-textbox"></asp:TextBox>
      </div>
      <div>
        <label class="login-label" for="password">Password:</label>
        <asp:TextBox ID="loginpassword" runat="server" CssClass="login-textbox" TextMode="Password"></asp:TextBox>
      </div>
      <div>
        <asp:Button ID="loginButton" runat="server" Text="Login" CssClass="login-button" />
      </div>
    </div>
  </form>


Login VB

Imports System.Data.SqlClient
Imports System.Data

Partial Class login
    Inherits System.Web.UI.Page

    Dim cn As New SqlConnection("Data Source=.\SQLEXPRESS;AttachDbFilename=E:\Projects\ASP.NET Project\WebSite\BookStore DB\BookStore.mdf;Integrated Security=True;Connect Timeout=30;User Instance=True")
    Dim cmd As New SqlCommand

    Protected Sub loginButton_Click(sender As Object, e As System.EventArgs) Handles loginButton.Click
        Dim username As String = loginusername.Text
        Dim password As String = loginpassword.Text

        Using cn
            cn.Open()
            Dim query As String = "SELECT COUNT(*) FROM SignupUsers WHERE UserName = @UserName AND Password = @Password"
            cmd = New SqlCommand(query, cn)
            cmd.Parameters.AddWithValue("@UserName", username)
            cmd.Parameters.AddWithValue("@Password", password)
            Dim count As Integer = Convert.ToInt32(cmd.ExecuteScalar())

            If count > 0 Then                
                Response.Redirect("index.aspx")
            Else                
                MsgBox("Invalid username or password.")                
            End If
        End Using
    End Sub
End Class



Contact VB


Imports System.Data.SqlClient
Imports System.Data

Partial Class contact
    Inherits System.Web.UI.Page

    Dim cn As New SqlConnection("Data Source=.\SQLEXPRESS;AttachDbFilename=E:\Projects\ASP.NET Project\WebSite\BookStore DB\BookStore.mdf;Integrated Security=True;Connect Timeout=30;User Instance=True")
    Dim cmd As New SqlCommand

    Protected Sub sendButton_Click(sender As Object, e As System.EventArgs) Handles sendButton.Click
        cn.Open()
        cmd = New SqlCommand("insert into ContactTbl(ConName, ConEmail, ConPhone, ConMessage) values('" & name.Text & "','" & email.Text & "','" & phone.Text & "','" & message.Text & "')", cn)
        cmd.ExecuteNonQuery()
        MsgBox("Your Contact Details Submit Successfully !!!")
        ClearContactInputFields()
        cn.Close()
    End Sub

    Private Sub ClearContactInputFields()
        name.Text = ""
        email.Text = ""
        phone.Text = ""
        message.Text = ""
    End Sub
End Class





Show Image


<asp:Repeater ID="Repeater1" runat="server" DataSourceID="SqlDataSource1">
      <HeaderTemplate>
        <table class="books-table">
      </HeaderTemplate>
      <ItemTemplate>
        <div class="product">
          <asp:Image ID="Image1" runat="server" ImageUrl='<%# Eval("CoverImage") %>' CssClass="book-image" Width="150" Height="200" />
          <h2>
            <asp:Label ID="Label2" runat="server" Text='<%# Eval("Title") %>'>
            </asp:Label>
          </h2>
          <p>₹ <asp:Label ID="Label5" runat="server" Text='<%# Eval("Price") %>'>
            </asp:Label>
          </p>
        </div>
      </ItemTemplate>
      <FooterTemplate>
        </table>
      </FooterTemplate>
    </asp:Repeater>