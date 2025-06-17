import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class ConnectMySQL {
    public static void main(String[] args) {
        String url = "jdbc:mysql://localhost:3306/babystep";
        String user = "root";
        String password = "";

        try {
            Connection conn = DriverManager.getConnection(url, user, password);
            System.out.println("✅ Koneksi berhasil ke database MySQL!");
            conn.close();
        } catch (SQLException e) {
            System.out.println("❌ Gagal konek: " + e.getMessage());
        }
    }
}
