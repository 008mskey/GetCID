vb.net:

			Dim nFlag As Integer = 0
			Dim ConfirmationID As String = ""
			Dim func As New GetCID.GetCID()
			Dim thread As Thread = New Thread(Sub()
				nFlag = func.GetConfirmationID(textBox1.Text, ConfirmationID)
				Dim action As Action = Sub() textBox2.Text = ConfirmationID
				Me.BeginInvoke(action)
			End Sub)
			thread.Start()


c#:


        private static T InlineAssignHelper<T>(ref T target, T value)
        {
            target = value;
            return value;
        }
        private void Button1_Click(object sender, EventArgs e)
        {
            int nFlag = 0;
            string ConfirmationID = "";
            GetCID.GetCID func = new GetCID.GetCID();
            System.Threading.Thread Thread = new System.Threading.Thread(() => InlineAssignHelper(ref nFlag, func.GetConfirmationID(textBox1.Text,ref ConfirmationID)));
            Thread.Start();
            do
            {
                if (nFlag != 0)
                {
                    break;
                }
                Application.DoEvents();
            } while (true);
            Thread.Abort();
            textBox2.Text = ConfirmationID;
        }