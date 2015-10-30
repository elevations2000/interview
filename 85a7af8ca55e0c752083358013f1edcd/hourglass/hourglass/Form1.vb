Public Class frmHourGlass

    'declare constants
    Const TOP_SHELF As Char = "_"
    Const SAND As Char = "x"
    Const LEFT_TOP As Char = "\"
    Const RIGHT_TOP As Char = "/"
    Const TEMP_BLANK_SPACE As Char = "_"
    Private Sub btnExit_Click(sender As Object, e As EventArgs) Handles btnExit.Click

        ' close the program
        Me.Close()

    End Sub

    Private Sub btnCreate_Click(sender As Object, e As EventArgs) Handles btnCreate.Click

        ' declare variables
        Dim dblHeight As Double ' for height of hourglass
        Dim dblCapacity As Double ' for sand in hourglass
        Dim dblTopRowSpaces As Double ' to hold the amount of spaces in the top row
        Dim dblTopHourglassSpaces As Double ' to hold the amount of spaces for the top of hourglass
        Dim dblTotalSpaces As Double ' to hold the amount of total spaces
        Dim strTopOutput As String ' to hold the top output of the hourglass
        Dim strBottomOutput As String ' to hold the bottom output of the hourglass
        Dim strTopShelf As String ' to hold the top of the hour glass
        Dim dblSandSpaces As String ' to hold the number of spaces with sand
        Dim dblBlankSpaces As String ' to hold the number of spaces with no sand



        ' text to make sure height box has value and that it is over 1
        If txtHeight.Text = String.Empty Then
            'display error message if text box is empty
            lblError1.Text = "Please enter an appropriate value"
        ElseIf txtHeight.Text < 2 Then
            ' display error message if criteria isn't met
            lblError1.Text = "Please enter an appropriate value"
            'test to be sure capacity box has value
        ElseIf txtCapacity.Text = String.Empty Then
            '  if empty display error message
            lblError2.Text = "Please enter an appropriate value"
            ' text to make sure capacity value is between 0 and 100
        ElseIf txtCapacity.Text < 0 Or txtCapacity.Text > 100 Then
            ' if not display error message
            lblError2.Text = "Please enter an appropriate value"
        Else
            'get height
            dblHeight = getHeight(txtHeight.Text)
            ' get capacity
            dblCapacity = getCapacity(txtCapacity.Text)
            ' calculate spaces in top row
            dblTopRowSpaces = getTopRow(dblHeight)
            ' calculate the spaces on top of hourglass
            dblTopHourglassSpaces = getTopHourglassSpaces(dblHeight)
            'get the top shelf of hourglass
            strTopShelf = drawTopHourGlass(dblTopHourglassSpaces)
            ' calculate the total amount of spaces
            dblTotalSpaces = calcTotalSpaces(dblTopRowSpaces)
            ' calculate the number of sand spaces
            dblSandSpaces = calcSandSpaces(dblTotalSpaces, dblCapacity)
            ' calculate the number of blank spaces
            dblBlankSpaces = calcEmptySpaces(dblSandSpaces, dblTotalSpaces)
            strTopOutput = drawTopOutput(dblHeight, dblTopRowSpaces, dblTotalSpaces, dblSandSpaces)
            'replace temporary blank space with blank space
            strTopOutput = Replace(strTopOutput, TEMP_BLANK_SPACE, "  ")
            strTopOutput = strTopShelf + strTopOutput
            strBottomOutput = drawBottomOutput(dblHeight, dblTopRowSpaces, dblTotalSpaces, dblSandSpaces)
            txtHourGlass.Text = strTopOutput + strBottomOutput

        End If



    End Sub

    Private Sub txtHeight_KeyPress(sender As Object, e As KeyPressEventArgs) Handles txtHeight.KeyPress, txtCapacity.KeyPress
        ' only allow numbers or backspace to be pressed in text boxes

        If (e.KeyChar < "0" OrElse e.KeyChar > "9") AndAlso
            e.KeyChar <> ControlChars.Back Then
            e.Handled = True
        End If

    End Sub



    Private Sub txtHeight_TextChanged(sender As Object, e As EventArgs) Handles txtHeight.TextChanged, txtCapacity.TextChanged
        ' clear the error message if one appears
        lblError1.Text = " "
        lblError2.Text = " "
        ' clear the hourglass
        txtHourGlass.Text = " "
    End Sub


    Private Function getHeight(userHeight) As Double
        Dim dblHeight As Double
        ' parse height value to double variable
        Integer.TryParse(userHeight, dblHeight)
        ' return height value
        Return dblHeight
    End Function

    Private Function getCapacity(userCapacity) As Double
        Dim dblCapacity As Double
        ' parse capacity value to double variable
        Integer.TryParse(userCapacity, dblCapacity)
        ' return capacity
        Return dblCapacity
    End Function

    Private Function getTopRow(ByVal heightValue As Double) As Double
        Dim dblAmtTopRow As Double
        'calculate the value of the spaces in the top row and assign variable
        dblAmtTopRow = (2 * heightValue) - 1
        'return variable
        Return dblAmtTopRow
    End Function

    Private Function getTopHourglassSpaces(ByVal heightValue As Double) As Double
        Dim dblAmtTopGlass As Double
        ' calculate the spaces on top of the hourglass and assingn value
        dblAmtTopGlass = (2 * heightValue) + 1
        'return variable
        Return dblAmtTopGlass
    End Function

    Private Function drawTopHourGlass(ByVal shelfSpaces As Double) As String
        Dim strTopShelf As String
        ' run a loop to fill the line with the top shelf
        For count As Integer = 1 To shelfSpaces
            strTopShelf += TOP_SHELF
        Next
        strTopShelf += vbNewLine
        Return strTopShelf
    End Function

    Private Function calcTotalSpaces(ByVal dblTopRowSpaces As Double) As Double
        Dim dblTotalSpaces As String
        ' run a decrementing loop to count the number of spaces
        For count As Integer = dblTopRowSpaces To 1 Step -2
            ' accumulate space total
            dblTotalSpaces += count
        Next
        ' return amount of spaces
        Return dblTotalSpaces
    End Function

    Private Function calcSandSpaces(ByVal dblTotal As Double, ByVal userCapacity As Double) As Double
        ' variables
        Dim dblSandSpaces As Double     ' to hold sand spaces
        Dim dblPercent As Double    ' to hold percentage total
        ' calculate the percentage to multiply the total amount by
        dblPercent = (userCapacity * 0.01)
        ' multiply the percentage by the total and round up
        dblSandSpaces = Math.Ceiling(dblTotal * dblPercent)
        ' return variable
        Return dblSandSpaces
    End Function

    Private Function calcEmptySpaces(ByVal dblSubSand As Double, ByVal dblTotalSpace As Double) As Double
        Dim dblEmptySpaces  ' to hold the number of empty spaces
        ' calculate the amount of empty spaces
        dblEmptySpaces = dblTotalSpace - dblSubSand
        ' return variable
        Return dblEmptySpaces
    End Function

    Private Function drawTopOutput(ByVal dblHourHeight As Double, ByVal dblTopSpaces As Double,
                                   ByVal dblTotalSpaces As Double, ByVal dblSandSpaces As Double) As String
        Dim strTopOutput As String = " "
        Dim dblRowSpaces As Double = dblTopSpaces
        For count = 1 To dblHourHeight
            strTopOutput += LEFT_TOP
            For index = 1 To dblTopSpaces
                If (dblTotalSpaces / dblSandSpaces) > 1 Then
                    strTopOutput += TEMP_BLANK_SPACE
                    dblTotalSpaces -= 1
                   
                ElseIf (dblTotalSpaces / dblSandSpaces) <= 1 Then
                    strTopOutput += SAND
                    dblTotalSpaces -= 1
                   
                End If
            Next

            strTopOutput += RIGHT_TOP & ControlChars.NewLine
            dblHourHeight -= 1
            dblTopSpaces -= 2
        Next
        Return strTopOutput
    End Function

    Private Function drawBottomOutput(ByVal dblHourHeight As Double, ByVal dblTopSpaces As Double,
                                   ByVal dblTotalSpaces As Double, ByVal dblSandSpaces As Double) As String
        Dim strBottomOutput As String = " "
        Dim dblSpace As Double = 1
        dblTotalSpaces = 1
        For count = 1 To dblHourHeight
            strBottomOutput += RIGHT_TOP
            For index = 1 To dblSpace
                If (dblTotalSpaces / dblSandSpaces) > 1 Then
                    strBottomOutput += SAND
                    dblTotalSpaces += 1
                ElseIf (dblTotalSpaces / dblSandSpaces) <= 1 Then
                    strBottomOutput += "  "
                    dblTotalSpaces += 1
                End If
            Next
            strBottomOutput += LEFT_TOP & vbNewLine
            dblHourHeight += 1
            dblSpace += 2

        Next
        Return strBottomOutput
    End Function

End Class


