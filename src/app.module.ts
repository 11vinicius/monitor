import { Module } from '@nestjs/common';
import { UserModule } from './user/user.module';
import { PropertyModule } from './property/property.module';
import { AuthModule } from './auth/Auth.module';
import { AuthGuard } from './auth/Auth.guard';


@Module({
  imports: [UserModule, PropertyModule, AuthModule],
  controllers: [],
  providers: [AuthGuard],
})
export class AppModule {}
